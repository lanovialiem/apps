<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalHistory;
use App\Models\OrderProduct;
use App\Models\Penawaran;
use App\Models\Product;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view approval')->only(['index', 'show']);
        $this->middleware('permission:create approval')->only(['create', 'store']);
        $this->middleware('permission:edit approval')->only(['edit', 'update']);
        $this->middleware('permission:delete approval')->only(['destroy']);
    }

    public function index()
    {
        $approvals = Approval::with(['penawaran', 'user', 'approver'])->latest()->get();
        $penawaran = Penawaran::with('user')->get();

        return view('approval.index', compact('approvals', 'penawaran'));
    }

    public function edit($id)
    {
        $approval = Approval::findOrFail($id);
        $roles = Role::all();
        $users = User::all();

        return view('approval.edit', compact('approval', 'roles', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Refresh dari database untuk dapat data terbaru
        $approval = Approval::with(['penawaran', 'penawaran.approvals', 'penawaran.orderProducts'])
            ->findOrFail($id);

        $user = auth()->user();
        $penawaran = $approval->penawaran;

        DB::transaction(function () use ($request, $approval, $user, $penawaran) {

            // =========================
            // UPDATE CURRENT APPROVAL
            // =========================
            $approval->update([
                'status' => $request->status,
                'approved_by' => $user->id,
                'approved_at' => now(),
            ]);

            ApprovalHistory::create([
                'penawaran_id' => $approval->penawaran_id,
                'name' => $user->name,
                'role' => $user->roles->first()->name ?? '-',
                'status' => $request->status,
                'notes' => 'Updated approval',
            ]);

            // =========================
            // REJECT FLOW (GLOBAL)
            // =========================
            if ($request->status == 'rejected') {

                $penawaran->update([
                    'status' => "rejected"
                ]);

                Approval::where('penawaran_id', $approval->penawaran_id)
                    ->where('sequence', '>', $approval->sequence)
                    ->update(['status' => 'waiting']);

                return;
            }

            // =========================
            // APPROVE FLOW (DYNAMIC)
            // =========================
            if ($request->status == 'approved') {

                // ambil next approval berdasarkan sequence
                $nextApproval = Approval::where('penawaran_id', $approval->penawaran_id)
                    ->where('sequence', '>', $approval->sequence)
                    ->orderBy('sequence', 'asc')
                    ->first();

                // =========================
                // IF NEXT LEVEL EXISTS
                // =========================
                if ($nextApproval) {

                    $nextApproval->update([
                        'status' => 'pending'
                    ]);

                    $penawaran->update([
                        'status' => 'waiting ' . strtolower($nextApproval->role)
                    ]);

                    return;
                }

                // =========================
                // FINAL APPROVAL
                // =========================
                // Refresh ulang penawaran untuk dapat data terbaru
                $penawaran->refresh();
                $penawaran->load('orderProducts.product');

                $this->finalApproval($penawaran);
            }
        });

        return redirect()->route('approvals.index')
            ->with('success', 'Approval berhasil diproses');
    }

    // =========================
    // FINAL APPROVAL LOGIC
    // =========================
    private function finalApproval($penawaran)
    {
        // Refresh approvals dari database
        $penawaran->load('approvals');
        $approvals = $penawaran->approvals;

        // =========================
        // DEBUG: Check apa yang terjadi
        // =========================
        Log::info('=== FINAL APPROVAL DEBUG ===');
        Log::info('Penawaran ID: ' . $penawaran->id);
        Log::info('Penawaran Status: ' . $penawaran->status);
        Log::info('Total Approvals: ' . $approvals->count());
        Log::info('Approval Statuses: ' . $approvals->pluck('status')->implode(', '));

        // reject check - cek case insensitive
        $reject = $approvals->firstWhere('status', 'rejected');

        if ($reject) {
            $penawaran->update([
                'status' => "rejected"
            ]);
            return;
        }

        // ensure all approved (case insensitive)
        $allApproved = $approvals->pluck('status')
            ->map(fn($s) => strtolower(trim($s)))
            ->every(fn($s) => $s === 'approved');

        Log::info('All Approved: ' . ($allApproved ? 'true' : 'false'));

        if (!$allApproved) {
            Log::warning('Tidak semua approval approved, skip stock deduction');
            return;
        }

        // ============================================
        // ATOMIC UPDATE - CEGAH DOUBLE EXECUTION
        // ============================================
        $updated = DB::table('penawarans')
            ->where('id', $penawaran->id)
            ->whereNotIn('status', ['completed', 'rejected'])
            ->update([
                'status' => 'completed',
                'updated_at' => now()
            ]);

        if ($updated === 0) {
            Log::warning('Penawaran #' . $penawaran->id . ' already processed, skipping...');
            return;
        }

        // CEK APAKAH ADA ORDER PRODUCTS
        $penawaran->load('orderProducts');
        $orderProducts = $penawaran->orderProducts;

        Log::info('Total Order Products: ' . $orderProducts->count());

        if ($orderProducts->isEmpty()) {
            Log::warning('Tidak ada order products, skip stock deduction');
            // Tetep update status ke completed
            $penawaran->update(['status' => 'completed']);
            return;
        }

        // ============================================
        // CEK TOTAL STOCK DARI SEMUA GUDANG SEBELUM DEDUCT
        // ============================================
        foreach ($orderProducts as $item) {
            $totalStockAllWarehouse = DB::table('stocks')
                ->where('product_id', $item->product_id)
                ->sum('quantity');

            Log::info("Product ID {$item->product_id}: Total stock di semua gudang = {$totalStockAllWarehouse}, dibutuhkan = {$item->quantity}");

            if ($totalStockAllWarehouse < $item->quantity) {
                $product = Product::find($item->product_id);
                Log::error("Stock tidak mencukupi untuk product {$product->product_name}");
                throw new \Exception("Stock tidak mencukupi untuk product: " . ($product->product_name ?? $item->product_id));
            }
        }

        // =========================
        // DEDUCT STOCK DARI SEMUA GUDANG
        // =========================
        try {
            $this->deductStockFromMultipleWarehouse($penawaran);

            // update all approvals
            $penawaran->approvals()->update([
                'status' => 'approved'
            ]);

            Log::info('Stock deduction berhasil!');
        } catch (\Exception $e) {
            Log::error('Stock deduction gagal: ' . $e->getMessage());
            throw $e;
        }
    }

    // =========================
    // DEDUCT STOCK - DARI SEMUA GUDANG
    // =========================
    private function deductStockFromMultipleWarehouse(Penawaran $penawaran)
    {
        if (!$penawaran->relationLoaded('orderProducts')) {
            $penawaran->load('orderProducts.product');
        }

        $orderProducts = $penawaran->orderProducts;

        foreach ($orderProducts as $item) {

            $productId = $item->product_id;
            $quantityNeeded = $item->quantity;
            $product = Product::find($productId);

            Log::info("Processing: {$product->product_name}, needed: {$quantityNeeded}");

            // Ambil semua stock untuk product ini, urut DESC (terbesar dulu)
            $stocks = Stock::where('product_id', $productId)
                ->where('quantity', '>', 0)
                ->orderBy('quantity', 'desc')
                ->lockForUpdate()
                ->get();

            if ($stocks->isEmpty()) {
                throw new \Exception("Stock tidak ditemukan untuk product: " . ($product->product_name ?? $productId));
            }

            // Hitung total stock
            $totalStock = $stocks->sum('quantity');

            if ($totalStock < $quantityNeeded) {
                throw new \Exception("Stock tidak mencukupi untuk product: " . ($product->product_name ?? $productId));
            }

            // ============================================
            // ALOKASI STOCK DARI BEBERAPA GUDANG
            // ============================================
            $remaining = $quantityNeeded;
            $allocations = [];

            foreach ($stocks as $stock) {
                if ($remaining <= 0) break;

                // Hitung berapa yang diambil dari gudang ini
                $takeFromThis = min($stock->quantity, $remaining);

                $previousStock = $stock->quantity;
                $newStock = $previousStock - $takeFromThis;

                // Update stock di gudang ini
                $stock->update([
                    'quantity' => $newStock
                ]);

                // Simpan untuk movement record
                $allocations[] = [
                    'warehouse_id' => $stock->warehouse_id,
                    'warehouse_name' => $stock->warehouse->warehouse_name ?? 'Unknown',
                    'quantity_taken' => $takeFromThis,
                    'previous_stock' => $previousStock,
                    'new_stock' => $newStock,
                ];

                Log::info("  - Gudang {$stock->warehouse_id}: {$previousStock} -> {$newStock} (ambil: {$takeFromThis})");

                $remaining -= $takeFromThis;
            }

            // ============================================
            // CREATE STOCK MOVEMENT RECORD
            // ============================================
            $warehouseNames = collect($allocations)->pluck('warehouse_name')->implode(', ');
            $totalTaken = collect($allocations)->sum('quantity_taken');

            StockMovement::create([
                'product_id' => $productId,
                'warehouse_id' => $allocations[0]['warehouse_id'], // Gudang pertama sebagai referensi
                'quantity' => $totalTaken,
                'previous_stock' => $totalStock,
                'new_stock' => $totalStock - $quantityNeeded,
                'movement_type' => 'kurang',
                'movement_date' => now(),
                'heading_type' => 'Project',
                'description' => 'Penawaran #' . $penawaran->offer_number . ' - ' . $product->product_name . ' (dipenuhi dari: ' . $warehouseNames . ')',
            ]);

            Log::info("  => Total diambil: {$totalTaken} dari gudang: {$warehouseNames}");
        }
    }

    // =========================
    // METHOD LAMA (TIDAK DIGUNAKAN LAGI)
    // =========================
    private function deductStock(Penawaran $penawaran)
    {
        // Dipindahkan ke deductStockFromMultipleWarehouse
        $this->deductStockFromMultipleWarehouse($penawaran);
    }
}

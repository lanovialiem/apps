@extends('welcome.welcome')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-10">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 py-6">
                <div class="flex items-center justify-between">

                    <div>
                        <h1 class="text-2xl font-bold text-white">
                            Form Approval
                        </h1>
                        <p class="text-blue-100 mt-1 text-sm">
                            Kelola proses approval penawaran
                        </p>
                    </div>

                    <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                </div>
            </div>

            {{-- Form --}}
            <form action="{{ route('approvals.store') }}" method="POST" class="p-8">

                @csrf

                {{-- Detail Penawaran --}}
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        Detail Penawaran
                    </h2>

                    <div id="detail-penawaran"
                        class="bg-gray-50 border border-dashed border-gray-300 rounded-2xl p-5 text-sm text-gray-500">

                        Data penawaran akan tampil di sini
                    </div>
                </div>

                {{-- Grid Form --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Penawaran --}}
                    <div class="md:col-span-2">
                        <label for="penawaran_id" class="block text-sm font-semibold text-gray-700 mb-2">

                            Pilih Penawaran
                        </label>

                        <select name="penawaran_id" id="penawaran_id"
                            class="w-full rounded-xl border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                            <option value="">
                                -- Pilih Penawaran --
                            </option>

                            @foreach ($penawarans as $penawaran)
                                <option value="{{ $penawaran->id }}"
                                    {{ old('penawaran_id') == $penawaran->id ? 'selected' : '' }}>

                                    {{ $penawaran->costamer_name }}
                                    -
                                    {{ $penawaran->company_name }}

                                </option>
                            @endforeach
                        </select>

                        @error('penawaran_id')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Nama Approval --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Approval
                        </label>
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <div class="bg-gray-50 border rounded-xl px-4 py-3 text-gray-700">
                            {{ Auth::user()->name }}
                        </div>
                    </div>

                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Role Penanggung Jawab
                        </label>
                        <input type="hidden" name="role" value="{{ Auth::user()->roles->first()->name ?? '' }}">
                        <div class="bg-gray-50 border rounded-xl px-4 py-3 text-gray-700">
                            {{ Auth::user()->roles->first()->name ?? 'No Role Assigned' }}
                        </div>
                    </div>

                    {{-- Level --}}
                    <div>
                        <label for="level" class="block text-sm font-semibold text-gray-700 mb-2">

                            Level Approval
                        </label>

                        <input type="number" name="level" id="level" min="1" value="{{ old('level', 1) }}"
                            class="w-full rounded-xl border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>

                        <div class="flex flex-wrap gap-3">

                            {{-- Pending --}}
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-yellow-200 bg-yellow-50 cursor-pointer hover:bg-yellow-100 transition">

                                <input type="radio" name="status" value="pending"
                                    class="text-yellow-500 focus:ring-yellow-400"
                                    {{ old('status', 'pending') == 'pending' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-yellow-700">
                                    Pending
                                </span>
                            </label>

                            {{-- Approved --}}
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-green-200 bg-green-50 cursor-pointer hover:bg-green-100 transition">

                                <input type="radio" name="status" value="approved"
                                    class="text-green-500 focus:ring-green-400"
                                    {{ old('status') == 'approved' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-green-700">
                                    Approved
                                </span>
                            </label>

                            {{-- Rejected --}}
                            <label
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border border-red-200 bg-red-50 cursor-pointer hover:bg-red-100 transition">

                                <input type="radio" name="status" value="rejected"
                                    class="text-red-500 focus:ring-red-400"
                                    {{ old('status') == 'rejected' ? 'checked' : '' }}>

                                <span class="text-sm font-medium text-red-700">
                                    Rejected
                                </span>
                            </label>

                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">

                            Catatan / Deskripsi
                        </label>

                        <textarea name="description" id="description" rows="4" placeholder="Tambahkan catatan approval..."
                            class="w-full rounded-xl border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-end gap-3 mt-10 pt-6 border-t">

                    <a href="{{ route('approvals.index') }}"
                        class="px-5 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">

                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition">

                        Simpan Approval
                    </button>

                </div>

            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('penawaran_id').addEventListener('change', function() {

            const penawaranId = this.value;
            const detailContainer = document.getElementById('detail-penawaran');

            if (!penawaranId) {
                detailContainer.innerHTML = '';
                return;
            }

            fetch(`/penawaran/${penawaranId}`)
                .then(response => response.json())
                .then(data => {

                    let html = `
                <div class="md:col-span-2">
                    <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6">

                        <h3 class="text-xl font-bold text-gray-700 mb-5">
                            Detail Penawaran
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                            <div>
                                <p class="text-sm text-gray-500">
                                    Customer Name
                                </p>

                                <p class="font-semibold text-gray-700">
                                    ${data.customer_name ?? '-'}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Company Name
                                </p>

                                <p class="font-semibold text-gray-700">
                                    ${data.company_name ?? '-'}
                                </p>
                            </div>

                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-200 rounded-xl overflow-hidden">

                                <thead class="bg-blue-600 text-white">
                                    <tr>
                                        <th class="px-4 py-3 text-left">No</th>
                                        <th class="px-4 py-3 text-left">Product</th>
                                        <th class="px-4 py-3 text-center">Quantity</th>
                                    </tr>
                                </thead>

                                <tbody>
            `;

                    if (data.order_products.length > 0) {

                        data.order_products.forEach((order, index) => {

                            html += `
                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                ${index + 1}
                            </td>

                            <td class="px-4 py-3">
                                ${order.product_id ? order.product.product_name : '-'}
                            </td>

                            <td class="px-4 py-3 text-center">
                                ${order.quantity}
                            </td>

                        </tr>
                    `;
                        });

                    } else {

                        html += `
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                            Tidak ada product
                        </td>
                    </tr>
                `;
                    }

                    html += `
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            `;

                    detailContainer.innerHTML = html;
                })
                .catch(error => {

                    console.error(error);

                    detailContainer.innerHTML = `
                <div class="text-red-500 text-sm mt-3">
                    Gagal mengambil detail penawaran
                </div>
            `;
                });

        });
    </script>
@endpush
{{-- @push('scripts')
<script>
    document.getElementById('penawaran_id').addEventListener('change', function () {

        const penawaranId = this.value;
        const detailContainer = document.getElementById('detail-penawaran');

        if (!penawaranId) {
            detailContainer.innerHTML = '';
            return;
        }

        fetch(`/penawaran/${penawaranId}`)
            .then(response => response.json())
            .then(data => {

                let html = `
                    <div class="md:col-span-2">
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6">

                            <h3 class="text-xl font-bold text-gray-700 mb-5">
                                Detail Penawaran
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Customer Name
                                    </p>

                                    <p class="font-semibold text-gray-700">
                                        ${data.customer_name ?? '-'}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Company Name
                                    </p>

                                    <p class="font-semibold text-gray-700">
                                        ${data.company_name ?? '-'}
                                    </p>
                                </div>

                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full border border-gray-200 rounded-xl overflow-hidden">

                                    <thead class="bg-blue-600 text-white">

                                        <tr>
                                            <th class="px-4 py-3 text-left">
                                                No
                                            </th>

                                            <th class="px-4 py-3 text-left">
                                                Product
                                            </th>

                                            <th class="px-4 py-3 text-center">
                                                Quantity
                                            </th>
                                        </tr>

                                    </thead>

                                    <tbody>
                `;

                if (data.order_products && data.order_products.length > 0) {

                    data.order_products.forEach((order, index) => {

                        html += `
                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-4 py-3">
                                    ${index + 1}
                                </td>

                                <td class="px-4 py-3">
                                    ${order.product?.product_name ?? '-'}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    ${order.quantity}
                                </td>

                            </tr>
                        `;
                    });

                } else {

                    html += `
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                Tidak ada product
                            </td>
                        </tr>
                    `;
                }

                html += `
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                `;

                detailContainer.innerHTML = html;
            })
            .catch(error => {

                console.error(error);

                detailContainer.innerHTML = `
                    <div class="text-red-500 text-sm mt-3">
                        Gagal mengambil detail penawaran
                    </div>
                `;
            });

    });
</script>
@endpush --}}

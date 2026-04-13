@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Penawaran Detail</h3>
    {{-- <a href="#" class="btn btn-primary">
    </a> --}}
</div>

<div class="card shadow-sm rounded-3 mb-4">
    <div class="card-body">
        <h5>Informasi Utama</h5>
        <table class="table table-bordered">
            <td class="text-center">
                @if ($item->product_picture)
                <a href="{{ asset('storage/' . $item->file_mcu) }}" class="btn btn-sm btn-success" target="_blank">
                    View PDF
                </a>
                @else
                <span class="text-muted">-</span>
                @endif
            </td>
        </table>
    </div>
</div>

@include('layout.footer')
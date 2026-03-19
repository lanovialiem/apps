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
            <tr>
                <th>Company Name</th>
                <td>{{ $penawaran->company_name }}</td>
            </tr>
            <tr>
                <th>Subject</th>
                <td>{{ $penawaran->subject_name }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $penawaran->category_penawaran }}</td>
            </tr>
            <tr>
                <th>Contact Person</th>
                <td>{{ $penawaran->contact_person }}</td>
            </tr>
            <tr>
                <th>No Quotation</th>
                <td>{{ $penawaran->no_quotation }}</td>
            </tr>
            <tr>
                <th>Purposed Value</th>
                <td>Rp {{ number_format($penawaran->purposed_value, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Date SPH</th>
                <td>{{ \Carbon\Carbon::parse($penawaran->date_sph)->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $penawaran->description }}</td>
            </tr>
            <tr>
                <th>Upload Dokumen</th>
                <td>
                    @if ($penawaran->upload_dokumen)
                        <a href="{{ asset('storage/' . $penawaran->upload_dokumen) }}" target="_blank">
                            Download File
                        </a>
                    @else
                        <span class="text-muted">Tidak ada file</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>

@include('layout.footer')

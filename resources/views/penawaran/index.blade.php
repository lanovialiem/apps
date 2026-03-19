@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Penawaran</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('penawaran.create') }}" class="btn btn-primary">
            Add Penawaran
        </a>
        {{-- <a href="{{ route('penawaran.report') }}" class="btn btn-success">
            Rekap
        </a> --}}
    </div>
</div>

<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Penawaran</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Company Name</th>
                    <th>Subject Name</th>
                    <th>Category</th>
                    {{-- <th>Contact Person</th> --}}
                    <th>No. Quotation</th>
                    <th>Purposed Value</th>
                    <th>Date SPH</th>
                    <th>Description</th>
                    <th style="width: 220px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penawaran as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->subject_name }}</td>
                        <td>{{ $item->category_penawaran }}</td>
                        {{-- <td>{{ $item->contact_person }}</td> --}}
                        <td>{{ $item->no_quotation }}</td>
                        <td>{{ number_format($item->purposed_value, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_sph)->format('d-m-Y') }}</td>
                        <td>{{ Str::limit($item->description, 30) }}</td>

                        <td class="text-center">
                            <a href="{{ route('penawaran.show', $item->id) }}"
                                class="btn btn-sm btn-info text-white">
                                Detail
                            </a>
                            <a href="{{ route('penawaran.edit', $item->id) }}"
                                class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('penawaran.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($penawaran->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center text-muted">No data available.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        @include('layout.footer')

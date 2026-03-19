@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0 text-primary">Job Code</h3>
    <a href="{{ route('category_code.create') }}" class="btn btn-primary">Add Job Code</a>
</div>
<table class="table table-striped">
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Job Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd('employee'); --}}
            @foreach ($category_code as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Penomoran otomatis -->
                    <td>{{ $item->job_code }}</td>
                    <td>
                        <form action="{{ route('category_code.destroy', $item->id) }}" method="POST">
                            {{-- <button><a href="{{ route('category_code.show', $item->id) }}" class="tombol">Detail</a></button> --}}
                            <button> <a href="{{ route('category_code.edit', $item->id) }}"
                                    class="tombol">Edit</a></button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</table>
@include('layout.footer')

@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0 text-primary">Category</h3>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
</div>
<table class="table table-striped">
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>job_category</th>
                <th>Action</th>
        </thead>
        <tbody>
            {{-- @dd($category); --}}
            @foreach ($category as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Penomoran otomatis -->
                    <td>{{ $item->job_category }}</td>
                    <td>
                        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                            <button><a href="{{ route('category.show', $item->id) }}" class="tombol">Detail</a></button>
                            <button> <a href="{{ route('category.edit', $item->id) }}" class="tombol">Edit</a></button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>

                    </td>
                </tr>
            @endforeach

            <!-- Tambahkan baris data lain di sini -->
        </tbody>
    </table>

</table>
@include('layout.footer')

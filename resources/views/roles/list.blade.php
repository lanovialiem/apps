@extends('welcome.welcome')

@section('content')
    <div class="container">

        {{-- HEADER --}}
        <div class="page-header">
            <div>
                <h1 class="text-3xl font-bold text-white">
                    Roles
                </h1>
                <p class="text-blue-100 mt-2 text-sm">
                    Jabatan dan Level
                </p>
            </div>

            <div class="action-group">
                <a href="{{ route('roles.create') }}" class="btn-add">
                    Create New Role
                </a>

                <button command="show-modal" commandfor="dialog" class="btn-add">
                    Add Level
                </button>
            </div>
        </div>

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- CARD --}}
        <div class="employee-card"
            style="    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;">
            <div class="table-wrapper">

                <table class="table-design">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                {{-- NO --}}
                                <td>{{ $loop->iteration }}</td>

                                {{-- NAME --}}
                                <td class="font-semibold text-gray-800">
                                    {{ $role->name }}
                                </td>

                                {{-- PERMISSIONS --}}
                                <td>
                                    <div class="flex flex-wrap gap-2 max-w-[500px]">
                                        @forelse ($role->permissions as $permission)
                                            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-md">
                                                {{ $permission->name }}
                                            </span>
                                        @empty
                                            <span class="text-gray-400 text-xs">No permissions</span>
                                        @endforelse
                                    </div>
                                </td>

                                {{-- CREATED --}}
                                <td>
                                    {{ $role->created_at->format('d M Y') }}
                                </td>

                                {{-- ACTION --}}
                                <td>
                                    <div class="action-group">

                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
                                                Delete
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-400">
                                    No roles available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>


        {{-- ================= LEVEL TABLE ================= --}}
        <h1 class="mt-10 text-3xl font-bold text-white">
            Approval Levels
        </h1>

        <div class="employee-card mt-4">
            <div class="table-wrapper">

                <table class="table-design">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($approvalLevels as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="font-medium">
                                    {{ $item->role->name ?? '-' }}
                                </td>

                                <td>
                                    <span class="bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                        Level {{ $item->level }}
                                    </span>
                                </td>

                                <td>
                                    <form action="{{ route('approval_levels.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">
                                    No approval levels
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
    {{-- Modal --}}
    <div class="py-12">
        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        {{-- ADD LEVEL APPROVAL MODAL --}}
        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">

                {{-- BACKDROP --}}
                <el-dialog-backdrop class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
                </el-dialog-backdrop>

                {{-- MODAL WRAPPER --}}
                <div tabindex="0" class="flex min-h-full items-center justify-center p-4 focus:outline-none">

                    {{-- MODAL PANEL --}}
                    <el-dialog-panel
                        class="relative w-full max-w-2xl overflow-hidden rounded-3xl bg-white shadow-2xl transition-all">

                        {{-- HEADER --}}
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 id="dialog-title" class="text-2xl font-bold text-white">
                                        Add Approval Level
                                    </h3>

                                    <p class="mt-1 text-sm text-blue-100">
                                        Tambahkan level approval baru
                                    </p>

                                </div>

                                {{-- CLOSE --}}
                                <button type="button" command="close" commandfor="dialog"
                                    class="rounded-xl bg-white/20 p-2 text-white hover:bg-white/30 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- FORM --}}
                        <form id="add-level-form" action="{{ route('approval_levels.store') }}" method="POST">
                            @csrf
                            <div class="px-8 py-6 space-y-6">

                                {{-- GRID --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    {{-- LEVEL --}}
                                    <div>
                                        <label for="level" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Level
                                        </label>

                                        <input type="number" name="level" id="level" min="1"
                                            value="{{ old('level') }}" placeholder="Masukkan level"
                                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 text-gray-800 shadow-sm
                   focus:border-blue-500 focus:ring-blue-500 focus:outline-none transition">

                                        @error('level')
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- ROLE --}}
                                    <div>
                                        <label for="role_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Role
                                        </label>

                                        <select name="role_id" id="role_id" value="{{ old('role_id') }}"
                                            class="w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-700 shadow-sm
                   focus:border-blue-500 focus:ring-blue-500 focus:outline-none transition">

                                            <option value="" disabled selected>
                                                Select Role
                                            </option>

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('role_id')
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                {{-- FOOTER --}}
                                <div class="flex items-center justify-end gap-3 border-t bg-gray-50 px-8 py-5">

                                    {{-- CANCEL --}}
                                    <button type="button" command="close" commandfor="dialog"
                                        class="rounded-xl bg-white px-5 py-2.5 text-sm font-medium text-gray-700 border border-gray-300 hover:bg-gray-100 transition">
                                        Cancel
                                    </button>

                                    {{-- SUBMIT --}}
                                    <button type="submit"
                                        class="rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-blue-700 transition">
                                        Save
                                    </button>
                                </div>
                        </form>

                    </el-dialog-panel>

                </div>

            </dialog>

        </el-dialog>
    </div>

@endsection
{{-- @include('layout.footer') --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            // MODAL
            const dialog = document.getElementById('dialog');

            // OPEN MODAL
            $('[command="show-modal"]').on('click', function() {
                dialog.showModal();
            });

            // CLOSE MODAL
            $('[command="close"]').on('click', function() {
                dialog.close();
            });

            // FORM SUBMIT
            $('#add-level-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: {{ route('approval_levels.store') }},
                    method: "POST",
                    data: $(this).serialize(),

                    success: function(response) {

                        alert('✅ Approval level berhasil disimpan');

                        console.log(response);

                        // RESET FORM
                        $('#add-level-form')[0].reset();

                        // CLOSE MODAL
                        dialog.close();

                        // OPTIONAL RELOAD
                        location.reload();

                        /*
                        kalau tidak mau reload,
                        append row ke table pakai JS
                        */
                    },

                    error: function(xhr) {

                        console.log(xhr);

                        // VALIDATION ERROR
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += '• ' + value[0] + '\n';
                            });
                            alert(errorMessage);

                        } else {
                            alert('❌ Terjadi kesalahan server');
                        }
                    }
                });
            });

        });
    </script>
@endpush

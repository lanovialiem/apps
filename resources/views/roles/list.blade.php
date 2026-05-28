@vite(['src/input.css'])
@extends('welcome.welcome')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- TITLE -->
            <h1 class="m-10 text-2xl font-bold text-white-800">Roles</h1>

            <!-- SUCCESS MESSAGE -->
            @if (session('success'))
                <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('roles.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 shadow-sm">
                    Create New Role
                </a>
                <button command="show-modal" commandfor="dialog"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 shadow-sm">
                    Add Level</button>
            </div>

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
                                            Save Approval
                                        </button>
                                    </div>
                            </form>

                        </el-dialog-panel>

                    </div>

                </dialog>

            </el-dialog>

            <!-- TABLE -->
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-50 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Permissions</th>
                        <th class="py-2 px-4 border-b">Created</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr class="bg-gray-50 text-gray-700 uppercase text-sm leading-normal">
                            <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                            <td class="py-2 px-4 border-b">
                                @foreach ($role->permissions as $permission)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-md mr-2">
                                        {{ $permission->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="py-2 px-4 border-b">{{ $role->created_at->format('d M Y') }}</td>
                            <td class="py-2 px-4 border-b space-x-2">

                                <!-- EDIT -->
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
        text-white bg-blue-600 rounded-md hover:bg-blue-700 
        transition duration-200 shadow-sm">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
            text-white bg-red-600 rounded-md hover:bg-red-700 
            transition duration-200 shadow-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="m-10 text-2xl font-bold text-white-800">Add Level</h1>

            <!-- TABLE -->
            <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm bg-white">

                <table class="min-w-full divide-y divide-gray-200">
                    {{-- HEADER --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Level
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>

                    {{-- BODY --}}
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($approvalLevels as $item)
                            <tr class="hover:bg-gray-50 transition">
                                {{-- NO --}}
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $loop->iteration }}
                                </td>
                                {{-- NAME --}}
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $item->role->name ?? '-' }}
                                </td>
                                {{-- LEVEL --}}
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">
                                        Level {{ $item->level }}
                                    </span>
                                </td>

                                {{-- ACTION --}}
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('approval_levels.destroy', $item->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Are you sure?')">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

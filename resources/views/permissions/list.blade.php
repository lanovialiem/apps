    @vite(['src/input.css'])

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Content goes here -->
            <button class="mb-10 mt-10 flex items-center justify-between">
                <a href="{{ route('permissions.create') }}"
                    class="bg-slate-700 text-white px-4 py-2 rounded-md hover:bg-slate-600">
                    Create
                </a>
            </button>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-50 text-dark rounded-sm">
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Created</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($permissions) --- IGNORE --- --}}
                    @if ($permissions->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-center text-gray-500">
                                No permissions found.
                            </td>
                        </tr>
                    @else
                        @foreach ($permissions as $permission)
                            <tr class="bg-white text-dark border-b">
                                <td class="px-6 py-3 text-left">
                                    {{ $permission->id }}
                                </td>
                                <td class="px-6 py-3 text-left">
                                    {{ $permission->name }}
                                </td>
                                <td class="px-6 py-3 text-left">
                                    {{ $permission->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-3 text-center space-x-2">
                                    <a href="#"
                                        class="bg-blue-500 text-sm text-white px-3 py-1 rounded-md hover:bg-blue-600">Edit</a>
                                    <a href="#"
                                        class="bg-red-500 text-sm text-white px-3 py-1 rounded-md hover:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

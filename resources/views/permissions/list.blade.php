@vite(['src/input.css'])

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800">Permissions</h1>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
        <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
        @endif
        
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
                    <th class="py-2 px-4 border-b">No</th>
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
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-3 text-left">
                        {{ $permission->name }}
                    </td>
                    <td class="px-6 py-3 text-left">
                        {{ $permission->created_at->format('Y-m-d') }}
                    </td>
                    <td class="px-6 py-3 text-center space-x-2">
                        <a href="{{ route('permissions.edit', $permission->id) }}"
                            class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md hover:bg-blue-600">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-sm text-white px-3 py-1 rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </div>
</div>
@vite(['src/input.css'])

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TITLE -->
        <h1 class="text-2xl font-bold text-gray-800">Roles</h1>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
        <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
        @endif

        <!-- BUTTON -->
        <button class="mb-10 mt-10 flex items-center justify-between">
            <a href="{{ route('roles.create') }}"
                class="bg-slate-700 text-white px-4 py-2 rounded-md hover:bg-slate-600">
                Create
            </a>
        </button>

        <!-- TABLE -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-50 text-dark rounded-sm">
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Permissions</th>
                    <th class="py-2 px-4 border-b">Created</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>
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
                        <a href="{{ route('roles.edit', $role->id) }}" class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
        text-white bg-blue-600 rounded-md hover:bg-blue-700 
        transition duration-200 shadow-sm">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Are you sure?')" class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
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

    </div>
</div>
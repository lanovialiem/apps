@vite(['src/input.css'])

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold text-gray-800">Users</h1>

        @if (session('success'))
        <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
        @endif

        {{-- <button class="mb-10 mt-10">
            <a href="{{ route('users.create') }}"
                class="bg-slate-700 text-white px-4 py-2 rounded-md hover:bg-slate-600">
                Create
            </a>
        </button> --}}

        <table class="min-w-full bg-white border border-gray-200">

            <thead>
                <tr class="bg-gray-50">
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Roles</th>
                    <th class="py-2 px-4 border-b">Created</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)
                <tr>

                    <td class="py-2 px-4 border-b">
                        {{ $loop->iteration }}
                    </td>

                    <td class="py-2 px-4 border-b">
                        {{ $user->name }}
                    </td>

                    <td class="py-2 px-4 border-b">
                        {{ $user->email }}
                    </td>

                    <td class="py-2 px-4 border-b">
                        {{ $user->roles->pluck('name')->join(', ') }}
                    </td>

                    <td class="py-2 px-4 border-b">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    {{-- //button edit delete --}}
                    <td class="py-2 px-4 border-b space-x-2">

                        <!-- EDIT -->
                        <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
                            text-white bg-blue-600 rounded-md hover:bg-blue-700">
                            Edit
                        </a>

                        <!-- DELETE -->
                        {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Are you sure?')" class="inline-flex items-center px-3 py-1.5 text-sm font-medium 
                                text-white bg-red-600 rounded-md hover:bg-red-700">
                                Delete
                            </button>

                        </form> --}}

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
</div>
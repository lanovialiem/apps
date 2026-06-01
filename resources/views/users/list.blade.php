@vite(['src/input.css'])

@extends('welcome.welcome')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Users
            </h1>
            <p class="text-blue-100 mt-2 text-sm">
                Manajemen data user sistem
            </p>
        </div>

    </div>

    {{-- SUCCESS --}}
    @if (session('success'))
    <div class="mt-4 mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-md">
        {{ session('success') }}
    </div>
    @endif

    {{-- CARD --}}
    <div class="employee-card">

        {{-- TABLE WRAPPER --}}
        <div class="table-wrapper">

            <table class="table-design">

                {{-- HEADER --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                    @forelse ($users as $user)
                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="font-semibold text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td>
                            <div class="flex flex-wrap gap-1 max-w-[300px]">
                                @forelse ($user->roles as $role)
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-md">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-gray-400 text-xs">No roles</span>
                                @endforelse
                            </div>
                        </td>

                        <td class="text-gray-500 text-sm">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        {{-- ACTION --}}
                        <td>
                            <div class="action-group">

                                <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                {{-- DELETE (optional) --}}
                                {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-delete">
                                        Delete
                                    </button>
                                </form> --}}

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400">
                            No users available
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
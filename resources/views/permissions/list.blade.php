@extends('welcome.welcome')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Permissions
            </h1>
            <p class="text-blue-100 mt-2 text-sm">
                Manajemen hak akses sistem
            </p>
        </div>

        <div>
            <a href="{{ route('permissions.create') }}" class="btn-add">
                + Create Permission
            </a>
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

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                    @forelse ($permissions as $permission)
                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="font-semibold text-gray-800">
                            {{ $permission->name }}
                        </td>

                        <td class="text-gray-500 text-sm">
                            {{ $permission->created_at->format('d M Y') }}
                        </td>

                        {{-- ACTION --}}
                        <td>
                            <div class="action-group">

                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
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
                        <td colspan="4" class="text-center py-6 text-gray-400">
                            No permissions found
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
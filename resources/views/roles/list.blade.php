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
    <div class="employee-card" style="    border-bottom-left-radius: 0 !important;
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
@endsection
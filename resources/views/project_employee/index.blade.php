@include('layout.header')

<div class="container">

    <!-- Header -->
    <div class="page-header">
        <h3>
            All Project Employees
        </h3>

        <a href="{{ route('project_employee.create') }}"
           class="btn-add">
            + Add Project Employee
        </a>
    </div>

    <!-- Card -->
    <div class="employee-card">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-design">

                <!-- Head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>MCU</th>
                        <th>Position</th>
                        <th>Gender</th>
                        <th>Induction</th>
                        <th>On Site</th>
                        <th>Resign</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @foreach ($projectEmployee as $index => $project)
                        <tr>
                            <!-- No -->
                            <td>
                                {{ $index + 1 }}
                            </td>

                            <!-- Name -->
                            <td>
                                {{ $project->name }}
                            </td>

                            <!-- Company -->
                            <td>
                                {{ $project->company_name }}
                            </td>

                            <!-- Address -->
                            <td>
                                {{ $project->address }}
                            </td>

                            <!-- MCU -->
                            <td>
                                <span class="px-2 py-1 text-xs rounded
                                    @if($project->mcu == 'Valid') bg-green-100 text-green-700
                                    @else bg-red-100 text-red-600
                                    @endif">
                                    {{ $project->mcu }}
                                </span>
                            </td>

                            <!-- Position -->
                            <td>
                                {{ $project->position }}
                            </td>

                            <!-- Gender -->
                            <td>
                                {{ $project->gender }}
                            </td>

                            <!-- Induction -->
                            <td>
                                {{ $project->induction }}
                            </td>

                            <!-- On Site -->
                            <td>
                                {{ $project->date_resign }}
                            </td>

                            <!-- Resign -->
                            <td>
                                {{ $project->date_resign }}
                            </td>

                            <!-- Status -->
                            <td>
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($project->status == 'Active')
                                        bg-green-100 text-green-700
                                    @elseif($project->status == 'Inactive')
                                        bg-red-100 text-red-600
                                    @else
                                        bg-gray-100 text-gray-600
                                    @endif">
                                    {{ $project->status }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td>
                                <div>

                                    <a href="{{ route('project_employee.show', $project->id) }}"
                                       class="btn-detail">
                                        Detail
                                    </a>

                                    <a href="{{ route('project_employee.edit', $project->id) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('project_employee.destroy', $project->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-delete">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>

@include('layout.footer')
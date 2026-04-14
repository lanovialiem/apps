@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            All Project Employees
        </h3>

        <a href="{{ route('project_employee.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Project Employee
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <!-- Head -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider text-center">
                    <tr>
                        <th class="px-4 py-3 w-[50px]">No</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Company</th>
                        <th class="px-4 py-3 text-left">Address</th>
                        <th class="px-4 py-3">MCU</th>
                        <th class="px-4 py-3">Position</th>
                        <th class="px-4 py-3">Gender</th>
                        <th class="px-4 py-3">Induction</th>
                        <th class="px-4 py-3">On Site</th>
                        <th class="px-4 py-3">Resign</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($projectEmployee as $index => $project)
                        <tr class="hover:bg-blue-50 transition">

                            <!-- No -->
                            <td class="px-4 py-3 text-center">
                                {{ $index + 1 }}
                            </td>

                            <!-- Name -->
                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $project->name }}
                            </td>

                            <!-- Company -->
                            <td class="px-4 py-3">
                                {{ $project->company_name }}
                            </td>

                            <!-- Address -->
                            <td class="px-4 py-3 text-gray-600">
                                {{ $project->address }}
                            </td>

                            <!-- MCU -->
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-1 text-xs rounded
                                    @if($project->mcu == 'Valid') bg-green-100 text-green-700
                                    @else bg-red-100 text-red-600
                                    @endif">
                                    {{ $project->mcu }}
                                </span>
                            </td>

                            <!-- Position -->
                            <td class="px-4 py-3">
                                {{ $project->position }}
                            </td>

                            <!-- Gender -->
                            <td class="px-4 py-3 text-center">
                                {{ $project->gender }}
                            </td>

                            <!-- Induction -->
                            <td class="px-4 py-3 text-center">
                                {{ $project->induction }}
                            </td>

                            <!-- On Site -->
                            <td class="px-4 py-3 text-center">
                                {{ $project->date_resign }}
                            </td>

                            <!-- Resign -->
                            <td class="px-4 py-3 text-center">
                                {{ $project->date_resign }}
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3 text-center">
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
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('project_employee.show', $project->id) }}"
                                       class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                        Detail
                                    </a>

                                    <a href="{{ route('project_employee.edit', $project->id) }}"
                                       class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                        Edit
                                    </a>

                                    <form action="{{ route('project_employee.destroy', $project->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs text-white bg-red-500 rounded-lg hover:bg-red-600 shadow">
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
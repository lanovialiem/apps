@include('layout.header')

<div class="container mx-auto pt-32 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h3 class="text-2xl font-semibold text-blue-600">
            Project List
        </h3>

        <a href="{{ route('project.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
            + Add Project
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
                        <th class="px-4 py-3 text-left">Company</th>
                        <th class="px-4 py-3 text-left">Project</th>
                        <th class="px-4 py-3">Contract</th>
                        <th class="px-4 py-3">SPH Date</th>
                        <th class="px-4 py-3">Contract Date</th>
                        <th class="px-4 py-3">Purposed</th>
                        <th class="px-4 py-3">Approved</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y">
                    @foreach ($projectList as $index => $project)
                        <tr class="hover:bg-blue-50 transition">

                            <!-- No -->
                            <td class="px-4 py-3 text-center">
                                {{ $index + 1 }}
                            </td>

                            <!-- Company -->
                            <td class="px-4 py-3 font-medium text-gray-800">
                                {{ $project->company_name }}
                            </td>

                            <!-- Project -->
                            <td class="px-4 py-3">
                                {{ $project->project_name }}
                            </td>

                            <!-- Contract -->
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                    {{ $project->no_contract }}
                                </span>
                            </td>

                            <!-- Dates -->
                            <td class="px-4 py-3 text-center">
                                {{ $project->date_sph }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                {{ $project->date_contract }}
                            </td>

                            <!-- Values -->
                            <td class="px-4 py-3 text-right text-green-600 font-semibold">
                                Rp {{ number_format($project->purposed_value, 0, ',', '.') }}
                            </td>

                            <td class="px-4 py-3 text-right text-blue-600 font-semibold">
                                Rp {{ number_format($project->approved_value, 0, ',', '.') }}
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($project->status == 'Done')
                                        bg-green-100 text-green-700
                                    @elseif($project->status == 'On Progress')
                                        bg-yellow-100 text-yellow-700
                                    @else
                                        bg-gray-100 text-gray-600
                                    @endif
                                ">
                                    {{ $project->status }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('project.show', $project->id) }}"
                                       class="px-3 py-1.5 text-xs text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow">
                                        Detail
                                    </a>

                                    <a href="{{ route('project.edit', $project->id) }}"
                                       class="px-3 py-1.5 text-xs text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow">
                                        Edit
                                    </a>

                                    <form action="{{ route('project.destroy', $project->id) }}"
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
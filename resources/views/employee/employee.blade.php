@include('layout.header')

{{-- head start --}}
<div class="container mx-auto pt-32 px-4">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6 gap-4">

        <!-- Title -->
        <h3 class="text-2xl font-semibold text-blue-600">
            Employees
        </h3>

        <!-- Buttons -->
        <div class="flex flex-wrap gap-2">

            <a href="{{ route('employees.create') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow transition">
                + Add Employee
            </a>

            <a href="{{ route('employees.report') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg shadow transition">
                Rekap
            </a>

            <!-- Category Job -->
            <a href="{{ route('category.index') }}" class="px-4 py-2 text-sm font-medium rounded-lg shadow transition
           {{ request()->routeIs('category.index')
                ? 'bg-yellow-500 text-white'
                : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
                Category Job
            </a>

            <!-- Job Code -->
            <a href="{{ route('category_code.index') }}" class="px-4 py-2 text-sm font-medium rounded-lg shadow transition
           {{ request()->routeIs('category_code.index')
                ? 'bg-sky-500 text-white'
                : 'bg-sky-100 text-sky-700 hover:bg-sky-200' }}">
                Job Code
            </a>

        </div>
    </div>
    {{-- head end --}}

    {{-- body start--}}
    <div class="bg-white/80 backdrop-blur shadow-xl rounded-2xl overflow-hidden border border-gray-200">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-700">Employee List</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-600">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Identity ID</th>
                        <th class="px-6 py-3 text-left">Badge ID</th>
                        <th class="px-6 py-3 text-left">Full Name</th>
                        <th class="px-6 py-3 text-left">Start Date</th>
                        <th class="px-6 py-3 text-left">End Date</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($employee as $key => $item)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="px-6 py-4">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $item->identity_id }}</td>
                        <td class="px-6 py-4">{{ $item->badge_id }}</td>
                        <td class="px-6 py-4">{{ $item->full_name }}</td>
                        <td class="px-6 py-4">{{ $item->start_date }}</td>
                        <td class="px-6 py-4">{{ $item->end_date }}</td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('employees.show', $item->id) }}"
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 shadow-sm">
                                    Detail
                                </a>

                                <a href="{{ route('employees.edit', $item->id) }}"
                                    class="px-3 py-1.5 text-xs font-medium text-gray-800 bg-yellow-300 rounded-lg hover:bg-yellow-400 shadow-sm">
                                    Edit
                                </a>

                                <form action="{{ route('employees.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 shadow-sm">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if ($employee->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-400">
                            No data available.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

@include('layout.footer')
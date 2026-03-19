@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Employees</h3>
    <div class="d-flex gap-2">
        <a href="#" class="btn btn-warning">
            Download
        </a>
    </div>
</div>

<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Rekap</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Badge ID</th>
                    <th>Full Name</th>
                    <th>Job Category</th>
                    <th>Job Code</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th style="width: 220px;">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employee as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->badge_id }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->category_code_id }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>Status</td>
                    </tr>
                @endforeach

                @if ($employee->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">No data available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')

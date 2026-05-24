{{-- resources/views/approval/history.blade.php --}}

@extends('welcome.welcome')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Approval History</h4>

            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>Penawaran ID:</strong> {{ $penawaran->id }}
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Penawaran ID</th>
                            <th>Notes</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($histories as $history)
                            <tr>
                                <td>{{ $history->id }}</td>
                                <td>{{ $history->penawaran_id }}</td>
                                <td>{{ $history->notes }}</td>
                                <td>{{ $history->name }}</td>
                                <td>{{ $history->role }}</td>

                                <td>
                                    @if($history->status == 'approved')
                                        <span class="badge bg-success">
                                            Approved
                                        </span>
                                    @elseif($history->status == 'rejected')
                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($history->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $history->created_at->format('d M Y H:i') }}
                                </td>

                                <td>
                                    {{ $history->updated_at->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    No approval history found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
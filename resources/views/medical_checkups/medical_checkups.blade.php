@include('layout.header')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary mb-0">Medical Checkups</h3>
    <div class="d-flex gap-2">
        <a href="{{ route('medical_checkups.create') }}" class="btn btn-primary">
            Add MCU
        </a>
        {{-- <a href="{{ route('medical_checkups.report') }}" class="btn btn-success">
            Rekap
        </a> --}}
    </div>
</div>

<div class="card shadow rounded-3 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">MCU List</h5>
    </div>
    {{-- @dd($medical_checkups); --}}
    <div class="card-body p-0">
        <table class="table table-striped table-bordered mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Name</th>
                    <th>Hospital</th>
                    <th>MCU Date</th>
                    <th>MCU Expire Date</th>
                    <th>Result</th>
                    <th>Description</th>
                    <th>File</th>
                    <th style="width: 220px;">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($medical_checkups as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->employee->full_name }}</td>
                        {{-- <td>{{ $item->position }}</td> --}}
                        <td>{{ $item->hospital }}</td>
                        <td class="text-center">{{ $item->mcu_date }}</td>
                                        
                        @php
                            $today = \Carbon\Carbon::today();
                            $mcu = \Carbon\Carbon::parse($item->mcu_date);
                            $expire = \Carbon\Carbon::parse($item->expire_date);
                            $soon = $mcu->copy()->addMonths(11);
                        @endphp

                        <td class="text-center">

                             @if($today->gte($expire))
                                <span class="badge bg-danger">
                                    {{ $item->expire_date }} - Expired
                                </span>

                             @elseif($today->gte($soon))
                                <span class="badge bg-warning text-dark">
                                 {{ $item->expire_date }} - Expired Soon
                                </span>

                             @else
                                <span>
                                    {{ $item->expire_date }} - Valid
                                </span>
                             @endif

                        </td> 
                        <td class="text-center">{{ $item->result }}</td>
                        <td class="text-center">{{ $item->description }}</td>
                        <td class="text-center">
                            @if ($item->file_mcu)
                                <a href="{{ asset('storage/' . $item->file_mcu) }}" class="btn btn-sm btn-success"
                                    target="_blank">
                                    View PDF
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td class="text-center">
                            {{-- <a href="{{ route('medical_checkups.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                Detail
                            </a> --}}
                            {{-- <a href="{{ route('medical_checkups.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a> --}}
                            {{-- <form action="{{ route('medical_checkups.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form> --}}
                            <form action="{{ route('medical_checkups.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">No data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('layout.footer')

{{-- @push('scripts')
    <scripts>
        $(function(){
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(ev){
                var data = $('#expiry-date').val();
                @this.set('expiry-date', data);
            });
        });
    </scripts>
    
@endpush --}}
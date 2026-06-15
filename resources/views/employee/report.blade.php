{{-- @include('layout.header') --}}
@extends('welcome.welcome')
@section('content')
<div class="container">
    <div class="page-header">
         <div>
            <h1 class="text-3xl font-bold text-white">
                Employee Report
            </h1>
            <p class="text-blue-100 mt-2 text-sm">
                Rekap data karyawan perusahaan
            </p>
        </div>
        <div class="d-flex gap-2">
            <a href="#" class="btn-report">
                Download
            </a>
        </div>
    </div>
    <div class="employee-card">
        <div class="table-wrapper">
            <table class="table-design">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Badge ID</th>
                        <th>Full Name</th>
                        <th>Job Category</th>
                        <th>Job Code</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($join as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->badge_id }}</td>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->Category->job_category }}</td>
                        <td>{{ $item->category_code->job_code }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


</div>

    
@endsection
{{-- @include('layout.footer') --}}

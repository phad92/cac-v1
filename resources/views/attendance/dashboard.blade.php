@extends('layouts.layout')
@include('layouts.partials.utils')
{{-- @extends('attendance.partials.partial') --}}

@section('title', $page_title)

@section('content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Todays Order List</h4>
            @livewire('attendance.dashboard-attendance-list')
        </div>
    </div>
</div>
{{-- <div class="col-12 mt-5">
   
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $heading }} </h4>
         
            <div class="data-tables datatable-primary">
                <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ substr($attendance->meta_id, 0, 8) }}</td>
                                <td>{{ $attendance->ucname }}</td>
                                <td>{{  $attendance->start_time }}</td>
                                <td>{{ $attendance->end_time }}</td>
                                <td>{{ $attendance->duration }}</td>
                                <td>{{ $attendance->active }}</td>
                                <td>{{ "fadlu" }}</td>
                                <td>
                                    <a href="{{ route('attendance.show', $attendance->meta_id) }}" class="btn btn-flat btn-primary btn-sm mb-3">Attendance</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
<!-- Dark table end -->
@endsection
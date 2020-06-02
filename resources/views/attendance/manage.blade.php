@extends('layouts.layout')
@include('layouts.partials.utils')
{{-- @extends('attendance.partials.partial') --}}
@section('content')
<!-- Dark table start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @yield('success')
                    @yield('errors')
                    <div class="col-md-9">
                        <div class="">
                            <h4>Start an Attendance</h4>
                        </div>
                        <span>Click on the button to take an attendance</span>
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('attendance.start') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-flat btn-primary btn-md mb-3 pull-right">Start Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="col-12 mt-5">
    @if ($message = Session::get('success'))   
        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times"></span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $heading }} </h4>
         
            <div class="data-tables datatable-primary">
                <table id="dataTable3" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
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
                        @foreach ($attentants as $attendant)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ substr($attendant->att_id, 0, 8) }}</td>
                                <td>{{  $attendant->start_time }}</td>
                                <td>{{ $attendant->end_time }}</td>
                                <td>{{ $attendant->duration }}</td>
                                <td>{{ $attendant->active }}</td>
                                <td>{{ "fadlu" }}</td>
                                <td>
                                    <a href="{{ route('attendance.show', $attendant->att_id) }}" class="btn btn-flat btn-primary btn-md mb-3">Attendance</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Dark table end -->
@endsection
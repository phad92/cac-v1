@extends('layouts.layout')
@include('layouts.partials.utils')

@section('title', $page_title)

@section('content')
<!-- Dark table start -->

{{-- @include('attendance.partials.partial') --}}

   <div class="col-lg-12 mt-5">
       @yield('success')
       @yield('errors')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="single-table">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID: </th>
                                        <td colspan="3">{{ $attendanceMeta->meta_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title: </th>
                                        <td>{{ $attendanceMeta->name }}</td>
                                        {{-- <th>Category</th> --}}
                                        {{-- <td colspan="2">{{ $attendanceMeta->category }}</td> --}}
                                    </tr>
                                    <tr>
                                        <th>Date: </th>
                                        <td>{{ $attendanceMeta->datecreated }}</td>
                                        <th>Time: </th>
                                        <td>{{ $attendanceMeta->start_time }} - {{ $attendanceMeta->end_time }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created By: </th>
                                        <td colspan="2">{{ 'current user' }}</td>
                                        <td>
                                            <a href="{{ route('attendance.end') }}" class="btn btn-flat btn-sm btn-danger pull-right">End Attendance</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        @livewire('attendance.attendance-list', ['meta_id' => $attendanceMeta->id])
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Dark table end -->
@endsection
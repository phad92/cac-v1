@extends('layouts.layout')
@include('layouts.partials.utils')

@section('title', $page_title)

@section('content')
<!-- Dark table start -->

{{-- @include('attendance.partials.partial') --}}

   <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @yield('success')
                @yield('errors')
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
                                        <th>Start Time: </th>
                                        <td>{{ $attendanceMeta->start_time }}</td>
                                        <th>End Time: </th>
                                        <td>{{ $attendanceMeta->start_time }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created By: </th>
                                        <td colspan="2">{{ 'current user' }}</td>
                                        <td>
                                            <a href="" class="btn btn-flat btn-sm btn-danger pull-right">Pause</a>
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
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $attendant)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $attendant->attendantname }}</td>
                                <td>{{ $attendant->present }}</td>
                                <td>{{ $attendant->created_at }}</td>
                                <td>
                                    <a href="{{ route('member.show', $attendant->member_id) }}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                        {{-- @livewire('attendance.attendance-list', ['meta_id' => $attendanceMeta->meta_id]) --}}
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Dark table end -->
@endsection
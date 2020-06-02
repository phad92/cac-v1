@extends('layouts.layout')
@include('layouts.partials.utils')
@section('content')
<!-- Dark table start -->

{{-- @include('attendance.partials.partial') --}}

       <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @yield('success')
                    @yield('errors')
                    <div class="col-md-8">
                        
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th colspan="1">ID: </th>
                                            <td>{{ $attendanceMeta->att_id }}</td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="1">Start Time: </th>
                                            <td colspan="2">{{ $attendanceMeta->start_time }}</td>
                                            <th colspan="1">End Time: </th>
                                            <td colspan="2">{{ $attendanceMeta->start_time }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="1">Created By: </th>
                                            <td colspan="2">{{ 'current user' }}</td>
                                            <td colspan="3">
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
                            <th>Gender</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        @foreach ($members as $member)
                            <tr>
                                <td><?= $i++;?></td>
                                <td><?= $member->fullname ?></td>
                                <td><?= ucwords($member->gender)?></td>
                                <td><?= ucwords($member->location)?></td>
                                <td>
                                    <form action="{{ route('attendance.present', $attendanceMeta->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-flat btn-sm btn-success" type="submit">Present <i class="ti-check"></i></button>
                                    </form>
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
@extends('layouts.layout')
{{-- @include('layouts.partials.utils') --}}

@section('title', $page_title)

@section('content')
<!-- basic table start -->
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $heading .' - '. $member->fullname }}({{ $member->member_id }})</h4>
            <div class="row">
                <div class="col-4">image goes here</div>
                <div class="col-8">
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row bold-700">Name</th>
                                        <td class="text-right">{{ $member->fullname }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Gender</th>
                                        <td class="text-right"> {{ ucfirst($member->gender) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Age</th>
                                        <td class="text-right">{{ $member->age }} yrs</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Phone</th>
                                        <td class="text-right">{{ $member->phone }}</td>
                                    </tr>
                                    <!-- authorized person only -->
                                    @if (isset($member->email))
                                        <tr>
                                            <th scope="row bold-700">Email</th>
                                            <td class="text-right">{{ $member->email }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row bold-700">Occupation</th>
                                        <td class="text-right">{{ ucwords($member->occupation) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Hometown</th>
                                        <td class="text-right">{{ ucwords($member->hometown) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Current Location</th>
                                        <td class="text-right">{{ ucwords($member->location) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Marital Status</th>
                                        <td class="text-right">{{ ucfirst($member->marital_status) }}</td>
                                    </tr>
                                    @if ($member->marital_status === 'married')
                                        <tr>
                                            <th scope="row bold-700">Spouse Name</th>
                                            <td class="text-right">{{ ucwords($member->spouse) }}</td>
                                        </tr>
                                    @endif
                                    @if ($member->no_of_children > 0)
                                        <tr>
                                            <th scope="row bold-700">Number of Children</th>
                                            <td class="text-right">{{ $member->no_of_children }}</td>
                                        </tr>
                                    @endif
                                    @if (isset($member->user_id))
                                        <tr>
                                            <th scope="row bold-700">User Id</th>
                                            <td class="text-right">{{ $member->user_id }}</td>
                                        </tr>
                                    @endif
                                    
                                    <tr>
                                        <th scope="row bold-700">Updated On</th>
                                        <td class="text-right">updated on by author name</td>
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
<!-- basic table end -->
@endsection
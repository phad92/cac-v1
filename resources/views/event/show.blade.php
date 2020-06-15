@extends('layouts.layout')
@include('layout.partials.utils')

@section('title', $page_title)

<!-- basic table start -->
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $heading - $event->title }}({{ $event->event_id }})</h4>
            <div class="row">
                <div class="col-4">image goes here</div>
                <div class="col-8">
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row bold-700">Event Title</th>
                                        <td><?= ucwords($title)?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Rate</th>
                                        <td> <?= $rate?> GHC</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Venue</th>
                                        <td><?= ucwords($venue)?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Event Date</th>
                                        <td><?= $event_date. ' at '. $event_time?></td>
                                    </tr>
                                    <!-- authorized person only -->
                                    <tr>
                                        <th scope="row bold-700">Added on</th>
                                        <td>added on by author name</td>
                                    </tr>
                                    <tr>
                                        <th scope="row bold-700">Updated On</th>
                                        <td>updated on by author name</td>
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
@extends('layouts.layout')
@include('layouts.partials.utils')
@section('content')
<!-- Dark table start -->
                    <div class="col-12 mt-5">
                        @yield('success')
                        @yield('info')
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"><?= $heading;?></h4>
                             
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Event ID</th>
                                                <th>Event Title</th>
                                                <th>Event Rate</th>
                                                <th>Event Date</th>
                                                <th>Event Venue</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach ($events as $event)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $event->event_id }}</td>

                                                    <td>{{ ucwords($event->title) }}</td>
                                                    <td>{{ $event->rate }}</td>
                                                    <td>{{ $event->event_date . ' at ' .$event->event_time }}</td>
                                                    <td>{{ ucwords($event->venue) }}</td>
                                                    <td>
                                                        <form action="{{ route('event.destroy', $event->id) }}" method="post">
                                                            @csrf
                                                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-flat btn-sm btn-primary">edit</a>
                                                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-flat btn-sm btn-info">View</a>
                                                            @method('DELETE')
                                                            <button class="btn btn-flat btn-sm btn-danger" type="submit">Delete</button>
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
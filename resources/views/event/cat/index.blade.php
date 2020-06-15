@extends('layouts.layout')
@include('layouts.partials.utils')
@include('event.cat.create')

@section('title', $page_title)
    
@section('content')
@yield('eventcatCreate')
<!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title"><?= $heading;?></h4>
                             
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach ($eventcats as $event)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ ucwords($event->name) }}</td>
                                                    <td>
                                                        <form action="{{ route('eventcat.destroy', $event->id) }}" method="post">
                                                            @csrf
                                                            <a href="{{ route('eventcat.edit', $event->id) }}" class="btn btn-flat btn-sm btn-primary">edit</a>
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
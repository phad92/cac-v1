@extends('layouts.layout')
@section('content')
<!-- Dark table start -->


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
                                <h4 class="header-title"><?= $heading;?></h4>
                             
                                <div class="data-tables datatable-primary">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
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
                                                    <td><?= $member->age?></td>
                                                    <td><?= ucwords($member->gender)?></td>
                                                    <td><?= $member->phone?></td>
                                                    <td><?= ucwords($member->location)?></td>
                                                    <td>
                                                        <form action="{{ route('member.destroy', $member->id) }}" method="post">
                                                            @csrf
                                                            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-flat btn-sm btn-primary">edit</a>
                                                            <a href="{{ route('member.show', $member->id) }}" class="btn btn-flat btn-sm btn-info">View</a>
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


@section('manage')
<!-- Dark table start -->
<div class="col-12 mt-5">
    <div class="card">
        {{-- @yield('attdCategoryCreate') --}}
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ ucwords($category->name) }}</td>
                                <td>
                                    <form action="{{ route('attendance.category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('attendance.category.edit', $category->id) }}" class="btn btn-primary btn-flat btn-sm">Edit</a>
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
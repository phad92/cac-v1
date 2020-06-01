@section('eventcatCreate')
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title"> Create Category <small> ( <span class="text-danger">*</span> Required Fields)</small></h4>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-12">
                        @yield('success')
                        @yield('errors')
                    <form class="needs-validation" action="{{ route('eventcat.store') }}" method="post" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Category Name<sub class="text-danger">*</sub></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required="">
                                        @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">

                                    <div class="float-right">
                                        <button class="btn btn-flat btn-primary mr-2" type="submit" name="submit" value="Submit">Submit Form</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<!-- Server side end -->
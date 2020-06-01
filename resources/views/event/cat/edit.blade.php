@extends('layouts.layout')
@include('layouts.partials.utils')

@section('content')
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title">{{ $heading }}<small> ( <span class="text-danger">*</span> Required Fields)</small></h4>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        @yield('success')
                        @yield('errors')
                    <form class="needs-validation" action="{{ route('eventcat.update', $eventcat->id) }}" method="post" novalidate="">
                        @csrf
                        @method('PATCH')   
                        <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Event Title<sub class="text-danger">*</sub></label>
                                    <input type="text" class="form-control" name="name" value="{{ $eventcat->name }}" id="name" placeholder="Event Title" required="">
                                        @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>

                            </div>
                            <div class="float-right">
                                <button class="btn btn-flat btn-primary mr-2" type="submit" name="submit" value="Submit">Submit Form</button>
                                <button class="btn btn-flat btn-default" type="submit" name="submit" value="Cancel">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Server side end -->
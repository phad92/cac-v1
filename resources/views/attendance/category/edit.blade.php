@extends('layouts.layout')
@include('layouts.partials.utils')
@include('attendance.category.index');

@section('title', $page_title)

@section('content')

    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title">{{ $heading }}<small> ( <span class="text-danger">*</span> Required Fields)</small></h4>
                <div class="row">
                <div class="col-md-6">
                    @yield('success')
                    @yield('errors')
                    <form class="needs-validation" action="{{ route('attendance.category.update', $category->id) }}" method="post" novalidate="">
                        @csrf    
                        @method('PATCH')
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Category <sub class="text-danger">*</sub> </label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="name" placeholder="Category Name"  required="">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                                
                        </div>
                        <div class="float-right">
                            <button class="btn btn-flat btn-primary mr-2" type="submit" name="submit" value="Submit">Submit Form</button>
                            <a class="btn btn-flat btn-default mr-2" href="{{ route('attendance.category.manage') }}">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('manage')
@endSection
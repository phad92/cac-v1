@extends('layouts.layout')
@include('layouts.partials.utils')
{{-- @include('attendance.category.index'); --}}

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
                    <form class="needs-validation" action="{{ route('attendance.store') }}" method="post" novalidate="">
                        @csrf    
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Category Caption <sub class="text-danger">*</sub> </label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Give this operation or activity a name"  required="">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="col-form-label">Attendance Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($metaCategories as $cat)
                                        <option value="">Choose Category</option>
                                            <option value='{{ $cat->id }}'>{{ ucwords($cat->name) }} </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <div class="float-right">
                            <button class="btn btn-flat btn-primary mr-2" type="submit" name="submit" value="Submit">Start</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @yield('manage') --}}
@endSection

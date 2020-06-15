@extends('layouts.layout')
@include('layouts.partials.utils')

@section('title', $page_title)

@section('content')

    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title">{{ $heading }}<small> ( <span class="text-danger">*</span> Required Fields)</small></h4>
                <div class="row">
                    <div class="col-md-4">
                        {{ get_day_from_date($carbon) }}
                    </div>
                    <div class="col-md-8">
                        @yield('success')
                        @yield('errors')
                    <form class="needs-validation" action="{{ route('event.store') }}" method="post" novalidate="">
                        @csrf    
                        <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="title">Event Title<sub class="text-danger">*</sub></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Event Title" required="">
                                        @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rate">Event Rate <sub class="text-danger">*</sub></label>
                                    <input type="text" class="form-control" name="rate" id="rate" placeholder="Event Rate" required="">
                                    @error('rate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label class="col-form-label">Event Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $cat)
                                                <option value='{{ $cat->id }}'>{{ ucwords($cat->name) }} </option>
                                            @endforeach
                                        </select>
                                        @error('marital_status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label for="description">Event Description <sub class="text-danger">*</sub> </label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Event Description"  required="">
                                    @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb3">
                                    <div class="form-group">
                                        <label for="event_date" class="col-form-label">Event Date <sub class="text-danger">*</sub> </label>
                                        <input class="form-control" type="date" name="event_date"  id="event_date" required="">
                                        @error('event_date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mb3">
                                    <div class="form-group">
                                        <label for="event_time" class="col-form-label">Event Time <sub class="text-danger">*</sub> </label>
                                        <input class="form-control" type="time" name="event_time"  id="event_time" required="">
                                        @error('event_time')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="venue">Event Venue</label>
                                    <input type="text" class="form-control" name="venue" id="venue" placeholder="Event Venue">
                                    @error('venue')
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
<form wire:submit.prevent="processForm" class="needs-validation">
    @include('layouts.partials.utils')
    @yield('success')
                        @yield('errors')
    @csrf
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="first_name">First name<sub class="text-danger">*</sub></label>
            <input type="text" class="form-control" wire:model="first_name" id="first_name" placeholder="First name"  >
            @error('first_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="last_name">Last name <sub class="text-danger">*</sub> </label>
            <input type="text" class="form-control" wire:model="last_name" id="last_name" placeholder="Last name"  >
            @error('last_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb3">
            <div class="form-group">
                <label for="dob" class="col-form-label">Date of Birth <sub class="text-danger">*</sub> </label>
                <input class="form-control" type="date" wire:model="dob" id="dob"  >
                @error('dob')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label class="col-form-label">Gender <sub class="text-danger">*</sub> </label>
                <select class="form-control" wire:model="gender"   >
                    <option value="">Choose Gender</option>
                    @foreach (['male', 'female'] as $gender)
                        <option value='{{ $gender }}'>{{ $gender }} </option>
                    @endforeach
                </select>
                @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="phone">Phone Number<sub class="text-danger">*</sub><small class="text-info">(Active)</small></label>
            <input type="text" class="form-control" wire:model="phone" id="phone" placeholder="Phone Number"   >
            @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" wire:model="email" id="email" placeholder="Email Address">
            @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="occupation">Occupation <sub class="text-danger">*</sub></label>
            <input type="text" class="form-control" wire:model="occupation" id="occupation" placeholder="Occupation"   >
            @error('occupation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>


    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="location">Location <sub class="text-danger">*</sub> </label>
            <input type="text" class="form-control" wire:model="location" id="location" placeholder="Location"   >
            @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="hometown">Home Town</label>
            <input type="text" class="form-control" wire:model="hometown" id="hometown" placeholder="Home Town">
                @error('hometown')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="col-form-label">Marital Status</label>
                <select class="form-control" wire:model="marital_status">
                    <option value="">Choose Status</option>
                    @foreach (['married', 'single'] as $status)
                        <option value='{{ $status }}'>{{ ucfirst($status) }} </option>
                    @endforeach
                </select>
                @error('marital_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="spouse">Spouse Name</label>
            <input type="text" class="form-control" wire:model="spouse" id="spouse" placeholder="Spouse Name" >

                @error('spouse')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="no_of_children">Number of Children</label>
            <input type="number" class="form-control" wire:model="no_of_children" min="0" id="no_of_children" placeholder="Number of Children" >
                @error('no_of_children')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    </div>
    <div class="float-right">
        <button class="btn btn-flat btn-primary mr-2" type="submit">Submit Form</button>
        <button class="btn btn-flat btn-default" type="button">Cancel</button>
    </div>
</form>

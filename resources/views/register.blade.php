@extends('layout/main')
@section('title', "Register")
@section('container')

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row align-items-center justify-content-center">
        <div class="col-5">
            <div class="card" style="mt-3">
                <div class="card-header text-center">
                   <span class="fw-bold">
                    REGISTER
                   </span>
                </div>
                <div class="form-container">
                    <form name="register" id="register" method="post" action="{{ url('store-form') }}">
                        @csrf
                        <div class="form-row">
                            <div class="mt-3">
                                <label for="inputName">Name</label>
                                <input type="name" class="form-control form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    {{-- <span class="text-danger">{{ $errors->first('email') }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    {{-- <span class="text-danger">{{ $errors->first('password') }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="inputPassword4">Confirm Password</label>
                                <input type="password" class="form-control @error('confirmedPassword') is-invalid @enderror"
                                    id="confirmedPassword" placeholder="Password" name="confirmedPassword" value="{{ old('confirmedPassword') }}">
                                @error('confirmedPassword')
                                    {{-- <span class="text-danger">{{ $errors->first('confirmedPassword') }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="male"
                                name="gender">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                            @error('gender')
                                {{-- <span class="text-danger">{{ $errors->first('gender') }}</span> --}}
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="female"
                                checked name="gender">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                            @error('gender')
                                {{-- <span class="text-danger">{{ $errors->first('gender') }}</span> --}}
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <!-- Date input -->
                            <label class="control-label" for="date">Date</label>
                            {{-- <label for="date" class="col-sm-1 col-form-label">Date</label> --}}
                            <div class="col-sm-4">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            @error('dob')
                                {{-- <span class="text-danger">{{ $errors->first('dob') }}</span> --}}
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-3">
                                <select class="form-select @error('country_id') is-invalid @enderror"
                                    aria-label="Default select example" name="country_id" value="{{ old('country') }}">
                                    {{-- <option selected>Open this select menu</option> --}}
                                    <option disabled selected value="">Select a Country</option>
                                    @foreach ($countries as $country)
                                        <option {{ old('country_id') == $country->id ? "selected" : "" }} value= {{$country->id}}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    {{-- <span class="text-danger">{{ $errors->first('country_id') }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Register</button>
                        <br>
                        <span>Already have an account ? login <a href="{{route('login')}}">here</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

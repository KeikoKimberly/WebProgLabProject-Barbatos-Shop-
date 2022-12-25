@extends('layout/main')
@section('title', "Profile")
@section('container')

    <div class="row align-items-center justify-content-center">
        <div class="col-5" style="mt-3">
            <div class="card">
                <div class="card-header text-center">
                    <span class="fw-bold">
                        Profile
                    </span>
                </div>
                <div class="form-container">
                    <form name="register" id="register" method="post" action="{{ url('checkLogIn') }}">
                        @csrf
                        <div class="form-row">
                            <div class="mt-3">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="inputEmail4">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="inputEmail4">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{auth()->user()->gender == 1 ? 'Male' : 'Female'}}" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="inputEmail4">Date of Birth</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="{{auth()->user()->dob}}" readonly>
                            </div>
                            <div class="mt-3">
                                <label for="inputEmail4">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{auth()->user()->country->name}}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

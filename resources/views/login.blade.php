@extends('layout/main')
@section('container')

    <div class="container" style="mt-3">
        <div class="reg-title">
            {{-- <span> --}}
            Login
            {{-- </span> --}}
        </div>
        <div class="form-container">
            <form name="register" id="register" method="post" action="{{ url('checkLogIn') }}">
                @csrf
                <div class="form-row">
                    <div class="mt-3">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        {{-- @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" name="password">
                        {{-- @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <br>
                    <span>Don't have an account ? register <a href="#">here</a></span>
                </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
            </form>
        </div>
    </div>

@endsection

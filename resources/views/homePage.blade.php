@extends('layout/main')
@section('container')

    <p>ini homepage</p>
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

@endsection

@extends('layout/main')
@section('container')

    <div class="container" style="max-width: 80em; margin-top: 50px">
        <div class="reg-title" style="text-align: left">
            <span>{{$title}}</span>
            &nbsp;
            <a href="#">View All</a>
        </div>
        <div class="scrollmenu">
            <div class="row flex-nowrap" style="margin: 20px">
                @foreach ($data as $product)
                <div class="col-3">
                    <div class="card card-block">
                        <img src="{{ asset('uploads/'.$product->photo) }}" alt="">
                        <span>{{$product->proName}}</span>
                        <span>{{$product->detail}}</span>
                        <span><h5>IDR {{$product->price}}</h5></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

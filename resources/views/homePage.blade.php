@extends('layout/main')
@section('container')
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container" style="max-width: 80em; margin-top: 50px">
        <div class="scrollmenu">
            <div class="row flex-nowrap" style="margin: 20px">
                @foreach ($products as $product)
                <div class="col-3">
                    <div class="card card-block">
                        <img src="{{ asset('uploads/'.$product->photo) }}" alt="">
                        <span>{{$product->name}}</span>
                        <span>{{$product->detail}}</span>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-3">
                    <div class="card card-block">
                        <img src="{{ asset('uploads/products/Scarlett.jpg') }}" alt="">
                        <span>Card</span>
                        <span>Tes</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-block">
                        <img src="{{ asset('uploads/products/Skintific2.jpg') }}" alt="">
                        <span>Card</span>
                        <span>Tes</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card tes</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card tes</div>
                </div>
                <div class="col-3">
                    <div class="card card-block">Card tes</div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

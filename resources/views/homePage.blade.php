@extends('layout/main')
@section('container')
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach ($categories as $category)
        <div class="container" style="max-width: 80em; margin-bottom: 50px;">
            <div class="reg-title" style="text-align: left">
                <span>
                    {{ $category->name }}
                </span>
                &nbsp;
                <a href="{{ url('products/productCategory/' . $loop->iteration) }}">View All</a>
            </div>
            <div class="scrollmenu">
                <div class="row d-flex flex-nowrap" style="margin: 20px">
                    @if ($value = $products[$loop->iteration] ?? null)
                        @foreach ($products[$loop->iteration] as $product)
                            <div class="col-3">
                                <div class="card card-block p-3"
                                    onclick="location.href='{{ url('products/productDetail/' . $product->id) }}';"
                                    style="cursor: pointer;"
                                    >
                                        <img src="{{ asset('uploads/products/' . $product->photo) }}" alt="" style="width: 240px; height: 250px;">
                                        {{-- <a href="{{url('products/productDetail/'.$product->id)}}" class="stretched-link dark">{{$product->name}}</a> --}}
                                        <span><h6 class="mt-2">{{ $product->name }}</h6></span>
                                        <span>{{ $product->detail }}</span>
                                        <span>
                                            <h5>IDR {{ $product->price }}</h5>
                                        </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>Empty</h4>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection

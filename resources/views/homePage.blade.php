@extends('layout/main')
@section('title', "Barbatos Shop")
@section('container')
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container mb-3" style="max-width: 80em;">
        <form class="d-flex" id="search-manage" action="{{route('products.viewByName')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name" required>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>

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
                                        <img src="{{ asset('storage/img/product_images/' . $product->photo) }}" alt="" style="width: 240px; height: 250px;">
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
                        <h4>There's no item yet</h4>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection

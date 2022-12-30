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
                            {{-- <div class="col-3"> --}}
                                <div class="col-3 me-2 card card-block"
                                    onclick="location.href='{{ url('products/productDetail/' . $product->id) }}';"
                                    style="cursor: pointer; width: 15rem;"
                                    >
                                        <img class="card-img-top" src="{{ asset('storage/img/product_images/' . $product->photo) }}" alt=""
                                        style="width: 210px; height: 200px;"
                                        >
                                        {{-- <a href="{{url('products/productDetail/'.$product->id)}}" class="stretched-link dark">{{$product->name}}</a> --}}

                                    <div class="card-body">
                                        <p class="card-title">{{ $product->name }}</p>
                                        <p class="card-text">{{ $product->detail }}</p>
                                        <span>
                                            <h5>IDR {{ $product->price }}</h5>
                                        </span>
                                    </div>
                                </div>
                            {{-- </div> --}}
                        @endforeach
                    @else
                        <h4>There's no item yet</h4>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection

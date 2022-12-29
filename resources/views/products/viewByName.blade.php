@extends('layout/main')
@section('title', "Search Product")
@section('container')
    <div class="container mb-3" style="max-width: 80em;">
        <form class="d-flex" id="search-manage" action="{{route('products.viewByName')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name" required>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    @if (count($products) != 0)
        <div class="container" style="margin-top: 50px">
            <div class="scrollMenuCat">
                <div class="row row-cols-5 m-1">
                        @foreach ($products as $product)
                            <div class="col card card-block p-2"
                                onclick="location.href='{{ url('products/productDetail/' . $product->id) }}';"
                                style="cursor: pointer;">
                                <img src="{{ asset('storage/img/product_images/' . $product->photo) }}" alt=""
                                    style="width: 235px; height: 250px;">
                                {{-- <a href="{{url('products/productDetail/'.$product->id)}}" class="stretched-link dark">{{$product->name}}</a> --}}
                                <span>
                                    <h6 class="mt-2">{{ $product->name }}</h6>
                                </span>
                                <span>{{ $product->detail }}</span>
                                <span>
                                    <h5>IDR {{ $product->price }}</h5>
                                </span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div style="justify-content:space-around; margin-top:50px">
                <div class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}">&laquo;</a>
                        </li>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            @if ($i == $products->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="#">{{ $i }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        @else
        <div class="text-center p-3">
            <p>Sorry, The Product Is Unavailable</p>
        </div>
    @endif
@endsection


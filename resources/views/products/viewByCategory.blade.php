@extends('layout/main')
@section('title', "$title->name" . " Category")
@section('container')
    <div class="container" style="margin-top: 50px">
        <div class="reg-title m-0" style="text-align: left; max-width: 100%">
            <span>{{ $title->name }}</span>
            &nbsp;
        </div>
        <div class="scrollMenuCat">
            <div class="row row-cols-5 m-1">
                @if ($value = $data[0] ?? null)
                    @foreach ($data as $product)
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
                @else
                    <div class="p-2">
                        <h4>There's no item yet</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div style="justify-content:space-around; margin-top:50px">
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}">&laquo;</a>
                </li>
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                    @if ($i == $data->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{ $i }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $data->nextPageUrl() }}">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection

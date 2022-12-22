@extends('layout/main')
@section('container')

    <div class="container" style="max-width: 80em; margin-top: 50px">
        <div class="reg-title" style="text-align: left">
            <span>{{$title->name}}</span>
            &nbsp;
        </div>
        <div class="scrollmenu">
            <div class="row flex-nowrap" style="margin: 20px">
                @foreach ($data as $product)
                <div class="col-3">
                    <div class="card card-block">
                        <img src="{{ asset('uploads/products/'.$product->photo) }}" alt="">
                        <span>{{$product->name}}</span>
                        <span>{{$product->detail}}</span>
                        <span><h5>IDR {{$product->price}}</h5></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div style="justify-content:space-around; margin-top:50px" >
        <div>
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{$data->previousPageUrl()}}">&laquo;</a>
                    </li>
                    @for($i=1; $i<=$data->lastPage(); $i++)
                        @if($i == $data->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="#">{{$i}}</a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{$data->url($i)}}">{{$i}}</a>
                        </li>
                        @endif
                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="{{$data->nextPageUrl()}}">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>



</script>
@endsection

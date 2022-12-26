@extends('layout/main')
@section('container')

    <div class="container" style="max-width: 80em; margin-top: 50px">
        <div class="card">
            <div class="row" style="margin: 20px">
                <div class="col-lg-3 col-12">
                    <img src="{{ asset('uploads/products/'.$product->photo) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-9 col-12 px-md-5 px-2 py-md-0 py-2">
                    <form id="form-regist" enctype="multipart/form-data" action="{{route('cartItem.addToCart', $product->id)}}" method="POST">
                        @csrf
                        <h3>{{ $product->name }}</h3>
                        <li><b>Detail </b> {{ $product->detail }}</li>
                        <li><b>Price </b> {{ $product->price }}</li>
                        <li>
                            <b>Qty </b> <input type="number" min="0" name="qty" required>
                            @error('qty')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </li>
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="me-2">
                                <button type="submit" class="btn btn-primary rounded-20 mt-4">Purchase</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>



</script>
@endsection


@extends('layout/main')
@section('container')

    <div class="container" style="max-width: 80em; margin-top: 50px">
        <div class="card">
            <div class="row flex-nowrap" style="margin: 20px">
                <div class="col-3">
                    <img src="{{ asset('uploads/products/'.$product->photo) }}"  style="width: 300px; height: 300px;" alt="">
                </div>
                <div class="col-3 ml-5">
                    <h3>{{ $product->name }}</h3>
                    <li><b>Detail </b> {{ $product->detail }}</li>
                    <li><b>Price </b> {{ $product->price }}</li>
                    <li><b>Qty </b> <input type="number" min="0" name="qty"></li>
                    <li><button type="button" style="margin-top: 140px;" class="btn btn-success">Purchase</button></li>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>



</script>
@endsection


@extends('layout/main')
@section('title', "Cart")
@section('container')

<div class="container">
    @if (count($cartItems) == 0)
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
            <h4>Your cart is empty!</h4>
            <a class="btn btn-primary" href="{{Route('homePage')}}">Shop Now</a>
        </div>
        @else
            @foreach ($cartItems as $cartItem)
                <div class="row align-items-center justify-content-center">
                    <div class="card col-8 p-3 mb-3">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <img src="{{ asset('storage/img/product_images/'.$cartItem->product->photo) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="row align-items-start justify-content-start">
                                    <div class="col-10">
                                        <div class="d-flex flex-column align-items-start justify-content-center">
                                            <h3>{{ $cartItem->product->name }}</h3>
                                            <p>Quantity: {{$cartItem->qty}}</p>
                                            <p>Total Price: IDR {{$cartItem->qty * $cartItem->product->price}}</p>
                                        </div>
                                    </div>
                                    <div class="col-2 text-end">
                                        <form action="{{route('cartItem.destroy', $cartItem->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name='_method' value="DELETE">
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row align-items-center justify-content-center fixed-bottom py-2" style="background-color: #ffff">
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div class="mx-2">
                        <span>Total Price: IDR {{$totalPrice}}</span>
                    </div>
                    <a href="{{route("transactions.purchase")}}" class="btn btn-outline-success">Purchase</a>
                </div>
            </div>
    @endif

</div>
@endsection

@section('script')
<script>



</script>
@endsection

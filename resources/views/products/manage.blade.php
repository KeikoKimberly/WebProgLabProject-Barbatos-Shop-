@extends('layout/main')
@section('title', "Manage Product")
@section('container')

   <div class="container">
     <div class="row justify-content-center align-items-center">
        <div class="col-10">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <form class="d-flex" id="search-manage" action="{{route('products.manageByName')}}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name" required>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <div>
                    <a class="btn btn-primary" href="{{route('products.create')}}">Add Product</a>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="card pe-2">
                    <div class="row align-items-center justify-content-center w-100">
                        <div class="col-3">
                            <img src="{{ asset('storage/img/product_images/'.$product->photo) }}" alt="" style="max-height:150px;">
                        </div>
                        <div class="col-7">
                            <h3>{{$product->name}}</h3>
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="d-flex">
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning me-2">Edit</a>
                                <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name='_method' value="DELETE">
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-2 pt-1">
                {{ $products->links() }}
            </div>

        </div>
    </div>
   </div>
@endsection

@section('script')
<script>



</script>
@endsection

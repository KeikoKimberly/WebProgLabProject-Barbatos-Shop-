@extends('layout/main')
@section('title', "Manage Product")
@section('container')

   <div class="container">
     <div class="row justify-content-center align-items-center">
        <div class="col-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-4">
                <form class="d-flex" id="search-manage" action="{{route('products.manageByName')}}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name" required>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
                <div>
                    <a class="btn btn-primary" href="{{route('products.create')}}">Add Product <i class="fa fa-plus ms-2" aria-hidden="true"></i></a>
                </div>
            </div>
            @if (count($products) == 0)
                <div class="text-center p-3">
                    <p>The item is unvailable</p>
                </div>
                @else
                    @foreach ($products as $product)
                        <div class="card pe-2 mb-3">
                            <div class="row align-items-center justify-content-center w-100">
                                <div class="col-3">
                                    <img src="{{ asset('storage/img/product_images/'.$product->photo) }}" alt="" style="max-height:150px;">
                                </div>
                                <div class="col-7">
                                    <h3>{{$product->name}}</h3>
                                </div>
                                <div class="col-lg-2 col-12">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning me-2 text-white">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name='_method' value="DELETE">
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
            @endif
        </div>
    </div>
   </div>
@endsection

@section('script')
<script>



</script>
@endsection

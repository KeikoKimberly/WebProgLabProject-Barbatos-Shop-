@extends('layout/main')
@section('title', "Barbatos Shop")
@section('container')

   <div class="container">
     <div class="row justify-content-center align-items-center">
        <div class="col-10">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-md"><- Back</a>
            <div class="card mt-3">
                <div class="card-header">
                    Add Product
                </div>
                <div class="px-3 py-3">
                    <form id="form-regist" enctype="multipart/form-data" action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label class="mb-1" for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter the name here" name="name" value="{{old('name')}}" required>
                            @error('name')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label class="mb-1" for="category_id">Category</label>
                            <select class="form-select category_id" name="category_id" id="category_id" required>
                                <option disabled selected value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? "selected" : "" }} value= {{$category->id}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label class="mb-1" for="year">Detail</label>
                            <textarea class="form-control" cols="30" rows="7" id="detail" name="detail" required>{{{old('detail')}}}</textarea>
                            @error('detail')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label class="mb-1" for="price">Price</label>
                            <input type="text" class="form-control" id="price" aria-describedby="price" placeholder="Enter the price here" name="price" value="{{old('price')}}" required>
                            @error('price')
                                <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="formFile" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="image" name="image" accept=".png, .jpeg, .jpg">
                            <small class="text-muted">Format: .jpg .png .jpeg</small>
                            <div>
                                @error('image')
                                    <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4 row justify-content-center align-items-center">
                            <div class="col-sm-6 col-12 my-1">
                                <button type="submit" class="btn btn-primary w-75 rounded-20">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
   </div>
@endsection

@section('script')
<script>



</script>
@endsection

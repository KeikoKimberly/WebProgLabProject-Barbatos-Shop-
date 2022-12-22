<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function viewProduct(int $category_id = 0)
    {

        if ($category_id == 0) {
            $product = Product::all();
            $categories = Category::all();

            return view('homePage', ['products' => $product, 'categories' => $categories]);
        } else {
            $categories = Category::all();

            $data = Category::join('products', 'products.category_id', '=', 'categories.id')->where('products.category_id','=',$category_id)
              		->get(['products.name as proName', 'products.detail', 'products.price', 'products.photo', 'categories.name as catName']);
            $title = $data[0]->catName;
            return view('viewByCategory', ['data' => $data, 'categories' => $categories, 'title' => $title]);
        }
    }

    public function viewByCategory(int $category_id = 0)
    {
        $category = Category::with('products')->firstWhere('id', $category_id);
        $categories = Category::all();
        $products = $category->products;
        $title = "Category: " . $category->name;

        return view('viewByCategory', ['product' => $products, 'title' => $title, 'categories' => $categories]);
    }

    public function create()
    {
        return view('products.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->inputValidation($request, TRUE);
        $image = $this->imgValidation($request, 'public/img/product_images');

        DB::table('products')->insert([
            'name' => ucWords($request->name),
            'category_id' => $request->category_id,
            'detail' => $request->detail,
            'price' => $request->price,
            'photo' => $image,
            'created_at' =>  Carbon::now(),
        ]);

        return view('products.viewByCategory');
    }

    public function manage()
    {
        return view('products.manage', [
            'categories' => Category::orderBy('name')->get(),
            'products' => Product::paginate(10)
        ]);
    }

    public function manageByName(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%'.$request->name.'%')->paginate(10);
        return view('products.manage', [
            'categories' => Category::orderBy('name')->get(),
            'products' => $products
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit',[
            'categories' => Category::orderBy('name')->get(),
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $this->inputValidation($request, FALSE);
        if ($request->hasFile('image')) {
            $image = $this->imgValidation($request, 'public/img/product_images');
        } else {
            $image = $request->old_image;
        }

        $product->update([
            'name' => ucWords($request->name),
            'category_id' => $request->category_id,
            'detail' => $request->detail,
            'price' => $request->price,
            'photo' => $image,
        ]);

        return redirect()->route('homePage');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('homePage');
    }

    public function inputValidation($request, Bool $imageRequired)
    {
        if($imageRequired){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ],[
                'image.image' => "Please upload a product photo",
                'image.mimes' => "The photo can only be in jpg/png/jpeg format",
            ]);
        }
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|string',
            'detail' => 'required|string',
            'price' => 'required|integer',
        ],[
            'name.required' => "Please fill the product name",
            'category_id.required' => "Please fill the product category",
            'detail.required' => "Please fill the product detail",
            'price.required' => "Please fill the product price",
            'price.integer' => "Please fill the price section with number only",
        ]);
    }

    public function imgValidation($request, $path)
    {
        $replacedName = ucWords(str_replace(array(' '), '_', $request->name));

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $replacedName.'.'.$extension;
        Storage::putFileAs($path, $request->image, $fileName);

        return $fileName;
    }
}

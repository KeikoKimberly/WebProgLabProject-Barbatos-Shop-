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
        $this->inputValidation($request);
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

    public function inputValidation($request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|string',
            'detail' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ],[
            'name.required' => "Please fill the product name",
            'category_id.required' => "Please fill the product category",
            'detail.required' => "Please fill the product detail",
            'price.required' => "Please fill the product price",
            'price.integer' => "Please fill the price section with number only",
            'image.image' => "Please upload a product photo",
            'image.mimes' => "The photo can only be in jpg/png/jpeg format",
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

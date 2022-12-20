<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
}

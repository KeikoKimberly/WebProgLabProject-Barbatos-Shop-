<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', auth()->user()->id)->with('product')->get();

        $totalPrice = 0;

        foreach($cartItems as $cartItem){
            $totalPrice += $cartItem->qty * $cartItem->product->price;
        }

        return view('carts.index',[
            'categories' => Category::orderBy('name')->get(),
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $cartItem = CartItem::where('product_id', $id)->first();

        if($cartItem){
            $cartItem->update([
                'qty' => $cartItem->qty + $request->qty
            ]);
        } else {
            DB::table('cart_items')->insert([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'qty' => $request->qty,
                'created_at' =>  Carbon::now(),
            ]);
        }

        return redirect()->back()->with('status', 'Product Added to Cart');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('homePage');
    }
}

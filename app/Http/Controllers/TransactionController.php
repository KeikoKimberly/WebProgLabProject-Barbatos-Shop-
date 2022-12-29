<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function purchase()
    {
        $cartItems = CartItem::where('user_id', auth()->user()->id)->get();

        $transactionId = DB::table('Transactions')->insertGetId(array(
                                                    'user_id' => auth()->user()->id,
                                                    'created_at' =>  Carbon::now(),
                                                ));

        foreach($cartItems as $cartItem){
            DB::table('transaction_details')->insert([
                'transaction_id' => $transactionId,
                'product_id' => $cartItem->product_id,
                'qty' => $cartItem->qty,
                // 'created_at' =>  Carbon::now(),
            ]);

            $cartItem->delete();
        }

        return redirect('homePage')->with('status', 'Item(s) Purchased!');
    }

    public function showHistory()
    {
        $histories = Transaction::where('user_id', auth()->user()->id)->with('transactionDetail')->with('transactionDetail.product')->get();

        foreach($histories as $history){
            $totalQty = 0;
            $totalPrice = 0;

            foreach($history->transactionDetail as $item){
                $totalQty += $item->qty;
                $totalPrice += $item->product->price;
            }

            $history->totalQty = $totalQty;
            $history->totalPrice = $totalPrice;
        }

        return view('transactions.history', [
            'categories' => Category::orderBy('name')->get(),
            'histories' => $histories
        ]);
    }
}

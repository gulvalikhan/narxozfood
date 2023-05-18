<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function buy(){
        $sum = 0;
        $prices = Auth::user()->dishesBought()->where('status', 'in_cart')->get();
        foreach($prices as $q){
            $sum = ($sum + $q->price)*$q->pivot->quantity;
        }

        if(Auth::user()->pays()->first()->cash >= $sum) {
            $buy = Auth::user()->productsWithStatus('in_cart')->allRelatedIds();
            foreach ($buy as $b) {
                Auth::user()->productsWithStatus('in_cart')->updateExistingPivot($b, ['status' => 'ordered']);
            }
        }else{
            return back()->withErrors( __('messages.no_cash'));
        }
        $new =  Auth::user()->pays()->first()->cash - $sum;
        DB::table('pays')
            ->where('user_id', Auth::user()->id)
            ->update(['cash' => $new]);
        return back()->with('message', __('validation.buy_cart'));
    }

    public function index(){
        $dishesInCart=Auth::user()->productsWithStatus("in_cart")->get();
        return view('cart.index',['cart'=>$dishesInCart,'categories' => Category::all()]);
    }

    public function putToCart(Request $request, Dish $dish){
        $dishesInCart = Auth::user()->productsWithStatus("in_cart")->where('dish_id', $dish->id)->first();

        if($dishesInCart != null)
            Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($dish->id,
                ['quantity' => $dishesInCart->pivot->quantity+$request->input('quantity')]);
        else
            Auth::user()->productsWithStatus("in_cart")->attach($dish->id,
                ['quantity' => $request->input('quantity')]);
        return redirect(route('dishes.index'))->with('message' , __('messages.Add to Cart'));
    }

    public function deleteFromCart(Dish $dish){
        $dishesBought= Auth::user()->productsWithStatus("in_cart")->where('dish_id',$dish->id)->first();
        if ($dishesBought !=null )
            Auth::user()->productsWithStatus("in_cart")->detach($dish->id);

        return back();
    }
}

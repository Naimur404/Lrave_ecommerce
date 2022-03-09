<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.product.partial.carts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required'

        ]);
        if (Auth::check()) {
            $cart = Cart::Where('user_id', Auth::id())
                ->where('product_id', $request->product_id)->first();
        } else {
            $cart = Cart::Where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)->first();
        }



        if (!is_null($cart)) {
            $cart->increment('product_quantity');
        } else {
            $cart = new Cart();
            if (Auth::check()) {
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }

        session()->flash('sucess', 'Product had added to cart');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        } else {
            return redirect()->route('index');
        }
        return back();
        session()->flash('sucess', 'Cart item Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('sucess','Cart item delete');
        return back();
    }
}

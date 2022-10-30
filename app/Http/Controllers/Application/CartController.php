<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'user_id'=>'required|integer|exists:users,id'
        ]);
        $carts = Cart::where('user_id',$request->input('user_id'))->get();
        if ($carts->count()<=0){
            return response([
                'message'=>'Cart is empty!'
            ],404);
        }
        return response([
            'carts'=>$carts,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate fields
        $fields = $request->validate([
            'user_id'=>'required|integer',
            'product_id'=>'required|integer',
            'cart_qty'=>'required|integer|min:1',
            'specification'=>'string',
        ]);

        $cart = Cart::where('user_id',$request->input('user_id'))
            ->where('product_id',$request->input('product_id'))
            ->first();
        if ($cart){
            return response([
                'message'=>'Product Exists in the cart',
            ],200);
        }


        Cart::create($fields);
        return response([
            'message'=>'Added to cart successfully!',
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        if (!$cart){
            return response([
                'message'=>'Cart not found!'
            ],200);
        }
        return response([
            'cart'=>$cart
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate fields
        $fields = $request->validate([
            'user_id'=>'required|integer|exists:users,id',
            'product_id'=>'required|integer|exists:products,id',
            'cart_qty'=>'required|integer|min:1',
            'specification'=>'string',
        ]);
        Cart::find($id)->update($fields);
        return response([
            'message'=>'Cart Updated successfully!',
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::destroy($id);
        if (!$cart){
            return response(['message'=>'Deletion Failed!'],404);
        }
        return response([
            'message'=>'Deleted successfully'
        ],200);
    }
}

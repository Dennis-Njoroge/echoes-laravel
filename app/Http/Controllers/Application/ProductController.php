<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        if ($products->count() > 0){
            $response = response(['products'=>$products],200);
        }
        else{
            $response = response([
                'message'=>'No products found!'
            ],200);
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'category_id'=>'required | integer',
            'product_name' =>'required | unique:products,product_name',
            'product_price' => 'required|integer',
            'product_qty' =>'required|integer',
            'description'=>'string',
            'image'=>'string',
            'units'=>'required|string',
        ]);

        Product::create($fields);

        return response([
            'message'=>'Product Created!'
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
        $product = Product::find($id);

        if ($product){
           return response([
                'product'=>$product,
                'category'=>$product->category['category_name'],
            ],200);
        }
        return response([
                'message'=>'Product Not Found',
        ],404);

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
        $fields = $request->validate([
            'category_id'=>'required | integer',
            'product_name' =>'required | unique:products,product_name,'.$id,
            'product_price' => 'required|integer',
            'product_qty' =>'required|integer',
            'description'=>'string',
            'image'=>'string',
            'units'=>'required|string',
        ]);

        Product::find($id)->update($fields);

        return response([
            'message'=>'Product Updated!'
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
        $product = Product::destroy($id);
        if (!$product){
            return response([
                'message'=>'Product Not Found!'
            ],404);
        }
        return response([
            'message'=>'Product Removed Successfully'
        ],201);
    }
}

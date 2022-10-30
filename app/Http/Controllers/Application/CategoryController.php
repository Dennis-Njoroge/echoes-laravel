<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if ($categories->count() > 0){
            $response = response(['categories'=>$categories],200);
        }
        else{
            $response = response(['message'=> "No Categories Found"],404);
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
            'category_name'=>'required|unique:categories',
        ]);
        Category::create([
            'category_name' =>$fields['category_name']
        ]);

        return response([
            'message'=>'Success'
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
        $category = Category::find($id);
        if ($category){
            return response($category,200);
        }
       return response([
           'message'=>'Not Found'
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
        $category = Category::find($id);
        $request ->validate([
            'category_name'=>'required|unique:categories,category_name,'.$id,
        ]);
        $category->update([
            'category_name'=>$request->input('category_name')
        ]);

        return response([
            'message'=>'Updated successfully'
        ],201);
    }


    public function search($id){
        $category = Category::find($id);
        if (!$category){
            return response([
                'message'=>'Category Not Found'
            ],404);
        }
        if ($category->products->count()<=0){
            return response([
                'message'=>'No products found for this category',
            ],404);
        }
        return response([
            'products'=>$category->products
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequests;
use App\Http\Resources\Product\ProductCollection;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ProductCollection::collection(Product::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequests $request)
    {
        //
        $product = new Product;

        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();
        
        return response([
          
            'data' => new ProductResource($product)

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        //
        return new ProductResource($Product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
        //
        $request['detail'] = $request->description;
        unset($request['description']);
        $Product->update($request->all());

        return response([
            'data' => new ProductResource($Product)
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product, Request $id)
    {
        //
        $Product->delete($id);
        return response(null,201);
    }
}

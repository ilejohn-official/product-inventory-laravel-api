<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Models\Product;
use App\Interface\ProductServiceInterface;

class ProductController extends Controller
{
    public function __construct(private ProductServiceInterface $productService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();

        return $this->successResponse($products, null, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->storeProduct($request->validated());

        return $this->successResponse($product);
    }

    /**
    * Remove the specified resource(s) from storage.
    *
    * @param  \App\Http\Requests\DeleteProductRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function destroy(DeleteProductRequest $request)
    {
        $this->productService->deleteProducts($request->validated());

        return $this->successResponse();
    }
}

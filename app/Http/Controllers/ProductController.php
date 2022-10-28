<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ProductRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRepository $repository)
    {
      $response = $repository->paginate();
      return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductService $service
     * @param  StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, ProductService $service)
    {
      // $response = $repository->create($request->validated());
      // return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRepository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  ProductRepository $reposit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, ProductRepository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductRepository $reposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRepository $repository)
    {
        //
    }
}

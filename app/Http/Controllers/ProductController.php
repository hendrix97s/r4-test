<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  ProductRepository $reposit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRepository $repository)
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

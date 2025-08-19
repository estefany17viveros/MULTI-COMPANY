<?php

namespace App\Http\Controllers;

use App\Models\cart_product;
use App\Http\Requests\Storecart_productRequest;
use App\Http\Requests\Updatecart_productRequest;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storecart_productRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cart_product $cart_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart_product $cart_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecart_productRequest $request, cart_product $cart_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart_product $cart_product)
    {
        //
    }
}

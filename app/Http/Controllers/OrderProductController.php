<?php

namespace App\Http\Controllers;

use App\Models\order_product;
use App\Http\Requests\Storeorder_productRequest;
use App\Http\Requests\Updateorder_productRequest;

class OrderProductController extends Controller
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
    public function store(Storeorder_productRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(order_product $order_product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order_product $order_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateorder_productRequest $request, order_product $order_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order_product $order_product)
    {
        //
    }
}

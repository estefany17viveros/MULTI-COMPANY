<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');    
    }

}

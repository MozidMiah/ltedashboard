<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('front.shop.index');
    }

    public function box(){
        return view('front.shop.box');
    }
    public function banner(){
        return view('front.shop.banner');
    }
    public function product(){
        return view('front.shop.product');
    }
    public function filter(){
        return view('front.shop.filter');
    }
}

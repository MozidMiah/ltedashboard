<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function index(){
        return view('front.elements.index');
    }
    public function product(){
        return view('front.elements.product');
    }
}

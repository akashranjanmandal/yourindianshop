<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function faq(){
        return view('faq');
    }
    public function pricing(){
        return view('pricing');
    }
    public function product_detail(){
        return view('product-detail');
    }
    public function products(){
        return view('products');
    }
    public function shipping(){
        return view('shippincal');
    }
    public function signup(){
        return view('sign-up');
    }
    public function login(){
        return view('sign-in');
    }

}

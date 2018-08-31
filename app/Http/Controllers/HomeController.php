<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::with("Bid")->get();
		foreach($products as $product){
			foreach($product->bid as $bid){
				$bid->User;
			}
		}
        return view('home',compact('products'));
	}
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
		$products = Product::with("Bid")->get();
		foreach($products as $product){
			foreach($product->bid as $bid){
				$bid->User;
			}
		}
        return view('dashboard',compact('products'));
	}
}

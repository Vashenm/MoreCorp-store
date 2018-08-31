<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Bid;
use App\Product;

class BidController extends Controller
{

	/**
	 * Get product
	 *
	 * @param Request $request
	 * @return void
	 */
	public function getProduct($id){
		$highest = null;
		$lowest = null;
		$product = Product::where('id','=',$id)->with("Bid")->get();
		foreach($product[0]->bid as $bid){
			$bid->User;
			if(!$highest && !$lowest){
				$highest = $bid;
				$lowest = $bid;
			}


			if($bid->amount > $highest->amount){
				$highest = $bid;
			}

			if($bid->amount < $lowest->amount){
				$lowest = $bid;
			}
		}

		if($lowest == $highest){
			$lowest = null;
		}
		$product[0]->setAttribute('highest',$highest);
		$product[0]->setAttribute('lowest',$lowest);
		return $product;
	}
    /**	
	 *  Create a bid method
	 * 
	 */
	public function create(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'amount' => 'required|gt:0',
			'id' => 'required|exists:product,id',
		]);
		$error = null;
		if ($validator->fails()) {
			return dd($validator)->withInput();

		} else {

			$pid = $request->id;
			$oldBid = Bid::whereHas('product', function ($q) use ($pid) {
				$q->where('id', $pid);
			})->where('email','=',$request->email)->get();
			if($oldBid->isEmpty()){
				$bid = new Bid();
				$bid->email = $request->email;
				$bid->amount = $request->amount;
				$bid->save();
				$bid->Product()->attach($request->id);
				$product = $this->getProduct($request->id);
				$highest = $product[0]->highest;
				$lowest = $product[0]->lowest;
				return view('product',compact('product','highest','lowest','error'));
			} else{
				$error['bid'] = 'You have already placed a bid for this product.';
				return redirect()->back()->withErrors($error)->withInput();
			}

		}
	}
}

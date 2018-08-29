<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidController extends Controller
{
    /**	
	 *  Create a bid method
	 * 
	 */
	public function create(Request $request){
		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'amount' => 'required|number|gt:0',
			'id' => 'required|exists:product,id',
		]);

		if ($validator->fails()) {
			$message = $validator->errors();
			return response()->json(
				[
					'status' => 'error',
					'message' => $message,
				],
				409
			);

		} else {
			$bid = new Bid();
			$bid->name = $request->email;
			$bid->amount = $request->amount;
			$bid->save();
			$bid->Product()->attach($request->id);
			return response()->json(
				[
					'status' => 'success',
					'message' => 'Bid created',
					'bid' => $bid,
				]
			);
		}
	}
}

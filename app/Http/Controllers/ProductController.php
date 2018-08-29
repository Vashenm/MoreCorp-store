<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    /**	
	 *  Create a product method
	 * 
	 */
	public function create(Request $request){
		$validator = Validator::make($request->all(), [
			'name' => 'required|unique:product|max:255|min:3',
			'price' => 'required|number|gt:0',
			'description' => 'required|max:255|min:3',
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
			$product = new product();
			$product->name = $request->name;
			$product->price = $request->price;
			$product->description = $request->description;
			$product->save();
			return response()->json(
				[
					'status' => 'success',
					'message' => 'Product created',
					'product' => $product,
				]
			);
		}
	}

	/**	
	 *  Update a product method
	 * 
	 */
	public function update(Request $request){
		$validator = Validator::make($request->all(), [
			'id' => 'required|exists:product,id',
			'name' => 'max:255|min:3',
			'price' => 'number|gt:0',
			'description' => 'max:255|min:3',
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
			$product = Product::where('id','=',$id)->with("Bid")->get();
			$product[0]->name = $request->name;
			if($product[0]->price != $request->price){
				foreach($product[0]->bid as $bid){
					$bid->delete();
				}
			}
			$product[0]->price = $request->price;
			$product[0]->description = $request->description;
			$product[0]->save();
			return response()->json(
				[
					'status' => 'success',
					'message' => 'Product by Id updated',
					'product' => $product[0],
				]
			);
		}
	}

	/**	
	 *  Delete a product method
	 * 
	 */
	public function delete($id){
		$product = Product::where('id','=',$id)->with("Bid")->get();

		if ($product->isEmpty()) {
			$message = $validator->errors();
			return response()->json(
				[
					'status' => 'error',
					'message' => "No product found",
				],
				409
			);

		} else {
			if($product[0]->bid){
				foreach($product[0]->bid as $bid){
					$bid->delete();
				}
			}

			return response()->json(
				[
					'status' => 'success',
					'message' => 'Product by Id deleted',
				]
			);
		}
	}

	/**	
	 *  Read a product method
	 * 
	 */
	public function read($id){
		$product = Product::where('id','=',$id)->with("Bid")->get();

		if ($product->isEmpty()) {
			$message = $validator->errors();
			return response()->json(
				[
					'status' => 'error',
					'message' => "No product found",
				],
				409
			);

		} else {
			
			$product[0]->view_count = $product[0]->view_count+1;
			$product[0]->save();
			foreach($product[0]->bid as $bid){
				$bid->User;
			}
			return view('product',compact('product'));
			// return response()->json(
			// 	[
			// 		'status' => 'success',
			// 		'message' => 'Product by Id',
			// 		'product' => $product[0],
			// 	]
			// );
		}
	}

	/**	
	 *  Read all products method
	 * 
	 */
	public function readAll(){

		$products = Product::with("Bid")->get();
		foreach($products as $product){
			foreach($product->bid as $bid){
				$bid->User;
			}
		}
		return response()->json(
			[
				'status' => 'success',
				'message' => 'Products',
				'products' => $products,
			]
		);
	}
}

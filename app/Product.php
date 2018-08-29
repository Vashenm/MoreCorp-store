<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'Product';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name', 
		'sku', 
		'price', 
		'description',
		'view_count',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
	];
	
	public function Bid() {
		return $this->belongsToMany('App\Bid', 'bid_product');
	}
}

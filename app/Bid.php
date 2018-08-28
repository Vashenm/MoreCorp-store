<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
	   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'email', 
		'amount', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
	];
	
	public function Product() {
		return $this->belongsToMany('App\Product', 'bid_product');
	}
}

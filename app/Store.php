<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Store extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'store_tbl';
	protected $primaryKey = 'id';
	//public function product_info() {
    //     return $this->hasMany('App\ProductInfo','store_id','id')->with('product')->with('store')->where('product_status','=','9')->orderByRaw("RAND()");
    //}
	public function indicator() {
         return $this->belongsTo('App\Indicator','store_status','id');
    }
	public function store_owner() {
         return $this->hasOne('App\StoreOwner','store_id','id');
    }
	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table = 'product_information_tbl';
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function getVariantsInfo()
	{
		return $this->hasMany('App\Variants', 'product_info_id', 'id');
	}
	public function getChildProduct()
	{
		return $this->hasMany('App\childproduct', 'product_info_id', 'id')->with('getCombo');
	}			
}

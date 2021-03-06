<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class childproduct extends Model
{
    protected $table = 'product_tbl';
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function getCombo()
	{
		return $this->hasMany('App\Variantscombo', 'product_id', 'id')->with('getProductVariant');
	}	
}

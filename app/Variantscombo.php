<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variantscombo extends Model
{
    protected $table = 'product_combination_tbl';
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function getProductVariant()
	{
			return $this->belongsTo('App\Variants','product_variant_id','id')->with('getVariant');
	}	
}

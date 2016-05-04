<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    protected $table = 'product_variant_tbl';
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	 public function getVariant()
	 {
		return $this->belongsTo('App\BaseVariants','variant_id','id');
	 }	
}

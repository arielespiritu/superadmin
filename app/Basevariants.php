<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basevariants extends Model
{
    protected $table = 'variant_tbl';
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	 public function getVariant()
	 {
		return $this->belongsTo('App\Variants','variant_id','id');
	 }	
}

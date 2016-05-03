<?php
function checkloginAuthentication(){
	if (Auth::check()){
		$id = Auth::user()->id;
		$indicator_id = Auth::user()->indicator_id;
		if($indicator_id=="34"){
			return 1;
		}
		else{
			return 0;
		}
	}else{
		return -1;
	}
}
function getProductCombo($product_id)
{
	$productDetails =DB::table('product_combination_tbl as product_combo')
						->where('product_id','=',$product_id)
						->get();
					 DB::disconnect();
	return $productDetails;
}
function getProductvariantsDescription($product_variant_id)
{
	$productDescription= DB::table('product_variant_tbl as product_variant')
						->join('variant_tbl as variant','variant.id','=','product_variant.variant_id')
						->where('product_variant.id','=',$product_variant_id)
						->get();
						 DB::disconnect();
			if(count($productDescription) <= 0)
			{
				return '';
			}
			else
			{
				foreach($productDescription as $productcombo)
				{ }
				return 	$productcombo->variant_name.': '.$productcombo->variant_name_value;				 
			}
}
function getStoreName($store_id)
{
	$storeinfo= DB::table('store_tbl')->where('id','=',$store_id)->get();
	DB::disconnect();
	return $storeinfo[0]->store_name;
}
function imagePath($path)
{
	if(file_exists($path.'.png')){
		return $path.'.png';
	}elseif(file_exists($path.'.jpg')){
		return $path.'.jpg';
	}
	elseif(file_exists($path.'.jpeg')){
		return $path.'.jpeg';
	}	
	else{
		return 'assets/img/nobanner.png';
	}
}
?>
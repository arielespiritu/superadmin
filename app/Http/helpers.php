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
function checkRemoteFile($url)
{
	$header_response = get_headers($url.'0.jpg', 1);
	$header_response1 = get_headers($url.'0.png', 1);
	$header_response2 = get_headers($url.'0.jpeg', 1);
	$path="";
	if(strpos( $header_response[0], "404" ) !== true )
	{
	  $path =$url.'0.jpg';
	} 
	elseif( strpos( $header_response1[0], "404" ) !== true )
	{
	  $path =$url.'0.png';
	}
	elseif( strpos( $header_response2[0], "404" ) !== true )
	{
	  $path =$url.'0.jpeg';
	} 		
	else 
	{
	   $path =$url.'0.jpg';
	}
	return $path;
}
function getProductCombo($product_id)
{
	$productDetails =DB::table('product_combination_tbl as product_combo')
						->where('product_id','=',$product_id)
						->get();
					 DB::disconnect();
	return $productDetails;
}
function grammar_date($val, $sentence) {
	if ($val > 1) {
		return $val.str_replace('(s)', 's', $sentence);
	} else {
		return $val.str_replace('(s)', '', $sentence);
	}
}
function smartdate($timestamp) {
	$diff = time() - $timestamp;
	if ($diff <= 0) {
		return 'Now';
	}
	else if ($diff < 60) {
		return grammar_date(floor($diff), ' second(s) ago');
	}
	else if ($diff < 60*60) {
		return grammar_date(floor($diff/60), ' minute(s) ago');
	}
	else if ($diff < 60*60*24) {
		return grammar_date(floor($diff/(60*60)), ' hour(s) ago');
	}
	else if ($diff < 60*60*24*30) {
		return grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
	}
	else if ($diff < 60*60*24*30*12) {
		return grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
	}
	else {
		return grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
	}
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
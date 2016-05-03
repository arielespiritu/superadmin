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
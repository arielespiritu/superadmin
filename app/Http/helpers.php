<?php
function checkloginAuthentication(){
	if (Auth::check()){
		$id = Auth::user()->id;
		$indicator_id = Auth::user()->indicator_id;
		if($indicator_id=="2"){
			return 1;
		}
		else{
			return 0;
		}
	}else{
		return -1;
	}
}

function test(){
return 'test';
}
?>
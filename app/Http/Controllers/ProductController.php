<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\subcategory;
use App\Product;
use App\Store;
class ProductController extends Controller
{
	public function __construct()
	{
        //$this->beforeFilter('force.ssl');
		$this->middleware('auth');
	}	
	function showProduct(Request $request)
	{
		$id = Auth::user()->admin_user->id;
		$user = AdminUser::where('id','=',$id)->get();
		$Store = Store::all();
		return view('admin.product')->with('user',$user)
		->with('Store',$Store);
	}
	function showStoreProduct(Request $request,$mode)
	{
		$store_name = getStoreName($mode);
		$id = Auth::user()->admin_user->id;
		$user = AdminUser::where('id','=',$id)->get();
		$subcategory =subcategory::where('store_id','=',$mode)->get();
		$Product = Product::where('store_id','=',$mode)->get();
		return view('admin.mainproduct')->with('user',$user)
		->with('Product',$Product)
		->with('store_name',$store_name)
		->with('subcategory',$subcategory);
	}
	
}

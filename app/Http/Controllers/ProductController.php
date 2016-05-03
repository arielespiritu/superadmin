<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\subcategory;
use App\Product;
use App\childproduct;
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
		return view('admin.mainproduct')->with('user',$user)
				->with('Product',null)
				->with('Store',$Store)
				->with('subcategory',null);
	}
	function showStoreProduct(Request $request,$store_id)
	{
		$Store =Store::find($store_id);
		if(count($Store) <= 0)
		{
			return redirect('/product');
		}
		$store_name = $Store->store_name;
		$id = Auth::user()->admin_user->id;
		$Store = Store::all();
		$user = AdminUser::where('id','=',$id)->get();
		$subcategory =subcategory::where('store_id','=',$store_id)->get();
		$Product = Product::where('store_id','=',$store_id)->get();
		return view('admin.mainproduct')->with('user',$user)
				->with('Product',$Product)
				->with('Store',$Store)
				->with('subcategory',$subcategory);
	}
	function showProductInfo(Request $request,$mode)
	{
		$id = Auth::user()->admin_user->id;
		$Product = Product::find($mode);
		$store_name = getStoreName($Product->store_id);
		$user = AdminUser::where('id','=',$id)->get();
		return view('admin.productinfo')
				->with('product_name',$Product->product_name)
				->with('mode','edit')
				->with('store_name',$store_name)
				->with('user',$user);
	}
	function showProductInfoVariants(Request $request,$mode)
	{
		$id = Auth::user()->admin_user->id;
		$Product = Product::find($mode);
		$store_name = getStoreName($Product->store_id);
		$user = AdminUser::where('id','=',$id)->get();
		$childproduct =childproduct::where('product_info_id','=',$mode)->get();
		return view('admin.productinfo')
				->with('product_name',$Product->product_name)
				->with('childproduct',$childproduct)
				->with('mode','variants')
				->with('store_name',$store_name)
				->with('user',$user);	
	}
	
}

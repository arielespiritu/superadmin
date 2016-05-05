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
use App\Basevariants;
use App\Variantscombo;
use App\Variants;
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
		// return $Product;
		return view('admin.mainproduct')->with('user',$user)
				->with('Product',$Product)
				->with('Store',$Store)
				->with('store_name',$store_name)
				->with('subcategory',$subcategory);
	}
	function showProductInfo(Request $request,$mode)
	{
		$id = Auth::user()->admin_user->id;
		$Product = Product::find($mode);
		$store_name = getStoreName($Product->store_id);
		$user = AdminUser::where('id','=',$id)->get();
		return view('admin.productinfo')
				->with('product_info',$Product)
				->with('mode','edit')
				->with('store_name',$store_name)
				->with('user',$user);
	}
	function showProductInfoVariants(Request $request,$mode)
	{
		$id = Auth::user()->admin_user->id;
		$Product = Product::find($mode);
		if(count($Product) <= 0)
		{
			return redirect('/product/');
		}	
		$store_name = getStoreName($Product->store_id);
		$user = AdminUser::where('id','=',$id)->get();
		$childproduct =childproduct::where('product_info_id','=',$mode)->get();		
		return view('admin.productinfo')
				->with('product_info',$Product)
				->with('childproduct',$childproduct)
				->with('mode','variants')
				->with('store_name',$store_name)
				->with('user',$user);	
	}
	function showProductInfoEditVariants(Request $request,$product_id,$product_variant_id)
	{
		$id = Auth::user()->admin_user->id;
		$Product = Product::find($product_id);
		if(count($Product) <= 0)
		{
			return redirect('/product/');
		}
		$childproduct =childproduct::where('id','=',$product_variant_id)->with('getCombo')->get();
		
		if(count($childproduct) <= 0)
		{
			return redirect('/product/variants/'.$Product->id);
		}		
		$Variants = Variants::where('product_info_id','=', $product_id)->with('getVariant')->get();
		$store_name = getStoreName($Product->store_id);
		$user = AdminUser::where('id','=',$id)->get();
		return view('admin.productinfo')
				->with('product_info',$Product)
				->with('childproduct',$childproduct)
				->with('variant',$Variants)
				->with('mode','edit-variants')
				->with('store_name',$store_name)
				->with('user',$user);	
	}	
}

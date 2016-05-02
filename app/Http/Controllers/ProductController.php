<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
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
		$Product = Product::all();
		return view('admin.mainproduct')->with('user',$user)
		->with('Product',$Product);
	}
}

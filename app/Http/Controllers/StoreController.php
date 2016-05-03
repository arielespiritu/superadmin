<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use Session;
use Crypt;
use App\User;
use App\AdminUser;
use App\City;
use App\Store;
use App\StoreOwner;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;

class StoreController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
        //$this->beforeFilter('force.ssl');
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getStores()
	{
		$id = Auth::user()->admin_user->id;
		$user = AdminUser::where('id','=',$id)->get();
		$store = Store::with('indicator')->get();
		return view('admin.store')->with('user',$user)
		->with('store',$store);
	}	
	public function getStoresInfo($sid)
	{
		$id = Auth::user()->admin_user->id;
		$user = AdminUser::where('id','=',$id)->get();
		$store_info = Store::with('indicator')->with('store_owner')->where('id','=',$sid)->get();
		if(count($store_info)==0){
			return redirect('/store');
		}
		$city = City::all();
		return view('admin.store-info')->with('user',$user)
		->with('store_info',$store_info)
		->with('city',$city);
	}	
	
}

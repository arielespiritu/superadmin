<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use Session;
use Crypt;
use App\User;
use App\AdminUser;
use App\Store;
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
	
}

<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use Session;
use Crypt;
use App\User;
use App\AdminUser;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;

class DashboardController extends Controller {

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
	public function getDashboard()
	{
		$id = Auth::user()->admin_user->id;
		$user = AdminUser::where('id','=',$id)->get();
		return view('admin.index')->with('user',$user);
	}	
	
}

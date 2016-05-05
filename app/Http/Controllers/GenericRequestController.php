<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use Session;
use Crypt;
use App\User;
use App\AdminUser;
use App\Area;
use App\Store;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;

class GenericRequestController extends Controller {

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
	public function getArea(Request $request)
	{
		if ($request->ajax()) {
			try{
					$input = $request->all();
					$city_id = $input['cid'];
					$area = Area::where('city','=',$city_id)->get();
					return Response::json(array(
						'success' => true,
						'message' => 'Retrieve Success',
						'data' => $area 
					)); 
			}catch(\Exception $e){
					return Response::json(array(
						'success' => false,
						'message' => 'Retrieve Failed',
						'data' => null 
					)); 
			}
		}
	
	}
}

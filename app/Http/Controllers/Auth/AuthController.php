<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Input;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	public function postLogin(Request $request)
    {
		if (Auth::check()){
			if(checkloginAuthentication()!=1){
				return redirect()->back()->withInput()->withErrors('Invalid Login.');			
			}
		}	
		
	
			// validate the info, create rules for the inputs
			$rules = array(
				'email'    => 'required|email|max:60', // make sure the email is an actual email
				'password' => 'required|alphaNum|min:6|max:20' // password can only be alphanumeric and has to be greater than 6 characters
			);

			// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			
				return redirect('auth/login')
					->withErrors($validator) // send back all errors to the login form
					->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {
				// create our user data for the authentication
				$userdata = array(
					'indicator_id' => '34',
					'email'     => Input::get('email'),
					'password'  => Input::get('password')
				);
				// attempt to do the login
				if (Auth::attempt($userdata)) {
						return redirect('/');
				} else {        
					// validation not successful, send back to form 
						return redirect()->back()->withInput()->withErrors('Wrong username/password combination.');
				}
			}
		
	}
	public function getLogin()
	{
		if (checkloginAuthentication()==1)
		{
			return redirect('/');
		}else{
			return view('auth.login');
		}
	}


}

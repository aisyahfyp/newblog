<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
//use ArielMejiaDev\LarapexCharts;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Validator;
// use User;
use App\User;
use Auth;
use Redirect;
//use Request;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $table = "users";

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('guest')->except('logout');

    }
    
    public function username()
    {
        return 'username';
    }
    
    public function showLogin()
    {
        // show the form
        return view('login');
    }


    // public function doLogin(Request $request)
    // {
    // // validate the info, create rules for the inputs
    // $rules = array(
    //     'username' => 'required|string|max:255', // make sure the email is an actual email
    //     'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    // );

    // // run the validation rules on the inputs from the form
    // $validator = Validator::make(request()->all(), $rules);

    // // if the validator fails, redirect back to the form
    // if ($validator->fails()) {
    //     return Redirect::to('/')
    //         ->withErrors($validator) // send back all errors to the login form
    //         ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
    // } else {

    //     // create our user data for the authentication
    //     $userdata = array(
    //         'username'  => Request::get('username'),
    //         'password'  => Request::get('password')
    //     );

    //     // attempt to do the login
    //     if (Auth::attempt($userdata)) {

    //         // validation successful!
    //         // redirect them to the secure section or whatever
    //         return redirect('/dashboard');
    //         // for now we'll just echo success (even though echoing in a controller is bad)
    //         // echo 'SUCCESS!';

    //     } else {        

    //         // validation not successful, send back to form 
    //         return Redirect::to('/');

    //     }
    // }
    // }
    // public function doLogout()
    //     {
    //         Auth::logout(); // log the user out of our application
    //         return Redirect::to('/'); // redirect the user to the login screen
    //     }

    function checklogin(Request $request){

            // $user = User::where([
            //     'username' => $request->username,
            //     'password' => $request->password
            //     ]);
                
                $username = $request->input('username');
                $password = $request->input('password');

                $hashedPassword = User::where('username', $username)->first();
                
                if ($hashedPassword && Hash::check($password, $hashedPassword->password)) {
                echo "Welcome User";
                return redirect('/dashboard')->with('username', $username);
                }
                else{
                echo "Please enter correct details to login";
                return redirect('/');
                }


////////////
        // $this->validate($request, [
        // 'username'   => 'required|username',
        // 'password'  => 'required|alphaNum|min:3'
        // ]);

        // $user_data = array(
        // 'username'  => $request->get('username'),
        // 'password' => $request->get('password')
        // );

        // if(Auth::attempt($user_data))
        // {
        // return redirect('/dashboard');
        // }
        // else
        // {
        // return back()->with('error', 'Wrong Login Details');
        // }
    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('/');
    }
}





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Auth;
use Redirect;
use Validator;

class HomeController extends Controller
{
    protected $table = "users";
    
    use AuthenticatesUsers;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function username()
    {
        return 'username';
    }
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    function checklogin(Request $request){

        $user = \App\User::where([
            'username' => $request->username,
            'password' => $request->password
            ])->first();
            
                if ($user) {
                echo "Welcome User";
                return redirect('/dashboard');
                }
            else{
            echo "Please enter correct details to login";
            exit;
            }
    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     if($user){
     return route('/');
        }
    }

    
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     ////i override function username from AuthenticatesUsers.php
     ////  in LoginController.php
    //  public function username()
    //  {
    //      return 'email';
    //  }
     ////i override function username from AuthenticatesUsers.php
     ////  in LoginController.php
     public function username()
     {
         $val = request()->input('identify'); //ibrahem@gmail.com or 09000
         $key= filter_var($val,FILTER_VALIDATE_EMAIL)?'email' :'mobile';
         request()->merge([$key=>$val]);
         return $key;
     }
}

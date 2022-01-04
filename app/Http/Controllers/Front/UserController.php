<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function showUserName(){
        return 'ibrahem hasan';
    }
    public function getIndex(){
        // $data =[];
        // $data['id']=163055;
        // $data['name']='ibrahem';
        // $data['study']='master MWS';
       /* $obj = new \stdClass();
        $obj -> id =163055;
        $obj -> name ='ibrahem hasan';
        $obj -> study ='master MWS'; */
        $data=['ahmad','ibrahem','bero','hasan'];

       // return view('welcome',compact('obj'));
        return view('welcome')->with('data',$data);
    }
}
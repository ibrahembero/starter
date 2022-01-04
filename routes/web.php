<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/// simple Route
Route::get('/test1', function () {
    return 'welcome';
});
/// simple Route with required parameter
Route::get('/show-number/{id}', function ($id) {
    return 'welcome '."$id";
}) ->name('a');
/// simple Route with optional parameter
Route::get('/show-string/{id?}', function () {
    return 'welcome ';
}) ->name('b');

////
Route::namespace('Front')->group(function(){
    // all Route only access controller or methods in folder name Front
    //group of routes 
    Route::get('users','UserController@showUserName');
});

////
// Route::prefix('users')->group(function(){
//     //group of routes 
//     Route::get('/prefix',function(){
//         return 'work';
//     });
//     Route::get('show','UserController@showUserName');
//     Route::get('delete','UserController@showUserName');
//     Route::get('edit','UserController@showUserName');
//     Route::get('update','UserController@showUserName');
// });

/*
Route::group(['prefix'=>'users','middleware'=>'auth'],function(){
    //group of routes 
    Route::get('/prefix',function(){
        return 'work';
    });
    Route::get('show','UserController@showUserName');
    Route::get('delete','UserController@showUserName');
    Route::get('edit','UserController@showUserName');
    Route::get('update','UserController@showUserName');
});
*/
// middleware
Route::get('check',function(){
    return "hello from middleware";
}) ->middleware('auth');

///route for Admin folder
Route::group(['namespace'=>'Admin'],function(){
    // set of Routes
    Route::get('second','SecondController@showString0')->middleware('auth');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3');
});
Route::get('login',function(){
    return 'must be logined in to access this route';
})->name('login');

///////// resource Route for new controller with --resource
Route::resource('news','NewsController');

///// we will make route about return view
Route::group(['namespace'=>'Front'],function(){
    Route::get('index','UserController@getIndex');
});

//// Route for landing page 
Route::get('landing',function(){
    return view('landing');
});
//// Route for about us page 
Route::get('about',function(){
    return view('about');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify'=>'true']);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

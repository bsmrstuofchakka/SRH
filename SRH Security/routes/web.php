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
use Illuminate\Support\Facades\Auth;
/*Route::get('/', function () {
    return view('welcome');
});   */
//Route::get('/','HomeController@displayWelcome');
Route::get('/', function () {
    //return view('auth.login');
    if (auth()->guest()) {
        return redirect('/adminUser');
    }
    else{
        return redirect('/');
    }
});

Route::get('/login', function () {
   return view('auth.login');
});

Route::get('/', 'WelcomeController@displayWelcome');







Route::get('logout','LogoutController@displayLogout');





Route::get('adminUser', 'SharingController@displayWelcomeUser')->name('adminUser');

//users
Route::group(['middleware' => 'customAuth'], function(){

     // admin details
    //Route::get('logout','LogoutController@displayLogout');



// particular profile

    Route::get('particularProfile','ProfileController@displayParticularProfile');



//    security with search

    Route::post('barcodeUDetails/search', 'BarcodeController@listBarcodeDetailsSearch');
    Route::get('barcodeUDetails/search', 'BarcodeController@listBarcodDetailseSearch');



    Route::get('barcodeUDetails','BarcodeController@listUserDetailsBarcode');
    Route::get('barcodeUDetails/delete','BarcodeController@deleteUserDetailsBarcode');




//    userdetails    list with search

    Route::post('userDetails/search', 'UserController@listUserDetailsSearch');
    Route::get('userDetails/search', 'UserController@listUserDetailsSearch');




    Route::get('uDetails','UserController@listUserDetails');
    Route::get('userDetails/add','UserController@addUserDetails');
    Route::get('userDetails/edit','UserController@editUserDetails');
    Route::get('userDetails/delete','UserController@deleteUserDetails');
    Route::post('userDetails/save','UserController@saveUserDetails');

    Route::get('users','UserController@listUser');
    Route::get('users/add','UserController@addUser');
    Route::get('users/edit','UserController@editUser');
    Route::get('users/delete','UserController@deleteUser');
    Route::post('users/save','UserController@saveUser');



//    userlist with search

    Route::post('users/search', 'UserController@listUserSearch');
    Route::get('users/search', 'UserController@listUserSearch');






});

//for security
    Route::get('/checkin','SecurityController@index');
    Route::post('/add_checkin','SecurityController@add_checkin');


// profiles


Route::get('passwordChange','ProfileController@changePassword');
Route::post('passwordSave','ProfileController@savePassword');




Route::get('profileDisplay','ProfileController@displayProfile');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


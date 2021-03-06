<?php
use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'CustomerController@index')->name('root');
//Route::get('install', 'CustomerController@install');
Route::get('home', 'CustomerController@index');

Route::get('/', function(){
if (count(User::all())<1) {
        
        return redirect('register');			
    } else {
        return redirect('home');
    }
});

Route::post('/sendMail', 'CustomerController@sendMail')->name('send.mail');
Route::get('/getView', 'CustomerController@getView')->name('getView');
Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('admin', 'AdminController@index')->name('admin');
Route::get('admin/admProjects', 'AdminController@admProjects')->name('admin.admProjects');

Route::get('admin/getView', 'AdminController@getView')->name('admin.getView');
Route::post('admin/uploadImg', 'AdminController@uploadImg')->name('admin.uploadImg');
Route::post('admin/uploadObj', 'AdminController@uploadObj')->name('admin.uploadObj');
Route::post('admin/setView', 'AdminController@setView')->name('admin.setView');
Route::post('admin/setProject', 'AdminController@setProject')->name('admin.setProject');
Route::post('admin/destroyProject', 'AdminController@destroyProject')->name('admin.destroyProject');
Route::get('admin/{secName}', 'AdminController@section')->name('admin.{secName}');

Route::auth();
    // Only authenticated users may enter...

//Route::get('/home', 'HomeController@index');

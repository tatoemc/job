<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Van;
use App\Models\Offer;

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

Route::get('/', function (Request $request) {
   
    return view('index');
});
Route::get('admin/login', function () {
    return view('admin.login');
});

  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/{page}', 'AdminController@index'); 
Route::get('admin/logout', 'logoutController@logout')->name('logout');


Route::resource('jobs','JobController');
Route::resource('forms','FormController');

Route::resource('users','UserController');


Route::resource('Reports','ReportsController');


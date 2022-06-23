<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();


Route::group(['as'=>'admin.',
'prefix' => 'dashboard',
'middleware' => [ 'Language','is_admin','auth' ]
],function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories','App\Http\Controllers\Backend\CategoriesController');
Route::resource('users','App\Http\Controllers\Backend\UserController');
Route::resource('roles','App\Http\Controllers\Backend\RoleController');
Route::post('category/delete_all', [App\Http\Controllers\Backend\CategoriesController::class, 'Delete_All'])->name('categories.delete_all');
Route::get('category/{id}', [App\Http\Controllers\Backend\CategoriesController::class, 'updateStatus'])->name('categories.status');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

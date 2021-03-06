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



/*
|--------------------------------------------------------------------------
| Admin route start from here
|--------------------------------------------------------------------------
*/

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;

Route::get('/',function(){
    $footer_menu = Menu::getByName('Footer');
    $public_menu = Menu::getByName('Public');
    return view('welcome',compact('public_menu','footer_menu'));
});


Route::namespace('Admin')->prefix('admin')->group(function () {
    
    Route::get('/','AdminController@index')->name('admin.home');
    Route::get('/login','AuthController@showLoginForm')->name('admin.login');
    Route::post('/login','AuthController@login')->name('admin.login.submit');
    Route::get('/logout','AuthController@logout')->name('admin.logout');

    Route::get('/register','AuthController@showRegistationPage');
    Route::post('/register','AuthController@register')->name('admin.register');
});

// Menu area start

Route::namespace('Admin')->prefix('admin')->group(function(){

    Route::get('/menu','AdminController@menuSetting')->name('admin.menu.setting');
    Route::get('/url/setting','AdminController@urlSetting')->name('admin.url.setting');
    Route::get('/get/url/name/{id}','AdminController@getUrlName');
});

Auth::routes();
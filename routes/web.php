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

Route::get('usuario/{nombre}',function($nombre){
  return 'Hola usuario '.$nombre;
})
->where('nombre','[A-Za-z]+');


route::resource('marca','Producto\MarcaController');

route::get('panel','Desktop\AdministratorController@panel');
route::get('access','Desktop\AdministratorController@access');
route::get('reports','Desktop\AdministratorController@reports');

route::get('dashboards','Desktop\DashboardsController@index');//->middleware('auth');
route::resource('product','Product\ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
  route::get('demo',['as'=>'demo','uses'=>'DemoController@index']);
});

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

//use Illuminate\Routing\Route;

Route::get('/', 'ListarProductos@listar');

Route::post('/pedido' ,'agregarProductos@recogerProductos');
Route::post('/subirPedido' ,'verPedidos@listarPedidos');

Route::get('/mostrarproducto', 'PedidoController@mostraritem');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Factura@listarFactura')->name('home');
//nombrecontrolador@metodo
/*
Route::get('/', function () {

  return view('welcome');
});
*/



Auth::routes();

/*
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/{name}', function ($name) {
  echo "el parámetro del path recibido es: " . $name;
  exit();
});
Route::get('/pruebita', function () {
  echo "fue por get" ;
  exit();
});
Route::post('/pruebita', function () {
  echo "fue por post" ;
  exit();
});
Route::any('relatos/{numero}', function ($numero) {

  if(is_numeric($numero)){
    echo "petición recibida para el parametro :" .$numero;
  }

  exit();
  });
*/

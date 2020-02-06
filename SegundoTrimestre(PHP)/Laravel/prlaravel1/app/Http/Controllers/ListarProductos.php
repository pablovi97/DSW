<?php

namespace App\Http\Controllers;

use App\DetallePedido ;
use App\Producto;
use App\Pedidos;
use Exception;
use Illuminate\Http\Request;

class ListarProductos extends Controller
{
    public function __construct()
    {
    }

    function listar()
    {


        /**
         * @var Productos $producto
         *
         */
        /*
        $producto = new Productos();
        $producto->nombre = "unproducto";
        $producto->precio=111;
        echo "ejecutamos el grabado de productos";
        echo($producto);
        $producto->save();

        Productos::create([
            'nombre' => 'producto',
            'precio' => 80,
            ]);
$productos =Productos::all();
        foreach($productos  as $producto){
var_dump($producto->attributesToArray());
        }

        foreach ($productos as $producto) {
            var_dump($producto->attributesToArray());
        }
        */

        /**
         * @var array<Producto> $productos
         */
        /*
        $productos = Producto::all();
        return view('listarProductos', compact('productos'));
*/
/*
        var_dump(Pedidos::all()->first(function ($value, $key) {
            return $value->detallePedidos->count() > 1;
        }));
        die();
*/
     
          $pedido =  session()->get('pedido');

            if (isset($pedido)) {
           } else {
                $pedido = new Pedidos();
                //var_dump($pedido);
                //die();
                session(['pedido' => $pedido]);
            }
         
        $productos = Producto::paginate(2);
        return view('listarProductos', compact('productos'));
    }
}

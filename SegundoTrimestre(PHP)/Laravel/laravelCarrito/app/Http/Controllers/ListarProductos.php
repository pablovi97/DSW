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

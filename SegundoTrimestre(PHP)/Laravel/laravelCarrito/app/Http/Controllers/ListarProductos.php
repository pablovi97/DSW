<?php

namespace App\Http\Controllers;

use App\DetallePedido;
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
        $ped = session()->get('pedido');
        if ($ped) {
           foreach($ped->detallePedidos as $valor){
               echo $valor;
           }

        } else {
            echo("no hay pedido");
        }

        //session()->put('prueba', $prueba);
      
        $productos = Producto::paginate(2);
        return view('listarProduct', compact('productos'));
    }
}

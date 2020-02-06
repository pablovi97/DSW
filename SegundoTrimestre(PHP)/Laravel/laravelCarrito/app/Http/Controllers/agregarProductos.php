<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DateTime;
use App\Producto;
use App\DetallePedido;
use Exception;
use App\Http\Controllers\DB;
use App\Pedidos;
use Illuminate\Http\Request;

class agregarProductos extends Controller
{
    
    /**
     * @var array<Pedidos> $pedido
     */

    function recogerProductos(Request $r)
    {

        $pedido = session('pedido');
  
        $dc =  new DetallePedido();

        $cantidad =  $r->input("produ");


        $idProduc = $r->input("proid");
        $producto = Producto::find($idProduc);


        $dc->id_producto = $producto->idProducto;
        $dc->cantidad = $cantidad;
        $dc->precioProducto = $producto->precio;

        $pedido->detallePedidos->add($dc);
    
    
        session(['pedido' =>$pedido]);
        var_dump($pedido);
        die();
        session()->put('pedido');
        return redirect("/");
    }
}

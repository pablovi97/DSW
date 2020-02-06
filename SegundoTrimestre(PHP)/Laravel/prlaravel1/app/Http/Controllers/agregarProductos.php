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
    var_dump($pedido);
    die();
        $dc =  new DetallePedido();

        $cantidad =  $r->input("produ");


        $idProduc = $r->input("proid");
        $producto = Producto::find($idProduc);


        $dc->id_producto = $producto->idProducto;
        $dc->cantidad = $cantidad;
        $dc->precioProducto = $producto->precio;

        $pedido->detallePedidos->add($dc);
    
    
        session(['pedido' =>$pedido]);
        session()->put('pedido');
        return redirect("/");
    }
    function subirPedido()
    {

        if (auth()->user()) {
            DB::beginTransaction();
            try {
                $pedido =  session()->get('pedido');

                $pedido->id_usuario = auth()->user()->id_usuario;
                foreach ($pedido->detallePedidos as $val) {
                    $val->id_pedido = $pedido->id_pedido;
                    $val->save();
                }
                $pedido->fechaPedido = (new DateTime())->format('Y-m-d H:m:s');
                //$pedido->save();vuarda pedido en base de datos
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
        } else {
            $this->middleware('auth');
        }
    }
}

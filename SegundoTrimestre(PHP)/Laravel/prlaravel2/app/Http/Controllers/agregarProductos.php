<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DateTime;
use App\Producto;
use App\DetallePedido;
use Exception;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class agregarProductos extends Controller
{
     /**
         * @var array<Pedidos> $pedido
         */

    function recogerProductos(Request $r)
    {

        $pedido =  session()->get('pedido');

        $dc =  new DetallePedido();

        $cantidad =  $r->input("produ");


        $idProduc = $r->input("proid");
        $producto = Producto::find($idProduc);


        $dc->id_producto = $producto->idproducto;
        $dc->cantidad = $cantidad;
        $dc->precio = $producto->precio;

        $pedido->detallePedidos->add($dc);

        session()->put("pedido", $pedido);
        return redirect("/");
    }
    function subirPedido()
    {


        DB::beginTransaction();
        try {
            $pedido =  session()->get('pedido');

            $pedido->id_usuario = 4;
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
    }

    function verPedidos(){
        $pedido =  session()->get('pedido');
        return view('verCarrito', compact('pedido'));
    }
}

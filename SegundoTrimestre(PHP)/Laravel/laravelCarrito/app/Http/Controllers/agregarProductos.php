<?php

namespace App\Http\Controllers;
use App\Producto;
use App\DetallePedido;
use Exception;
use App\Pedidos;
use DateTime ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class agregarProductos extends Controller
{

    function recogerProductos(Request $r)
    {


        $dc =  new DetallePedido();

        $cantidad =  $r->input("produ");


        $idProduc = $r->input("proid");
        $producto = Producto::find($idProduc);


        $dc->id_producto = $producto->idProducto;
        $dc->cantidad = $cantidad;
        $dc->precioProducto = $producto->Precio;


        $pedido =  session()->get('pedido');

        if (isset($pedido)) {
            foreach ($pedido->detallePedidos as $clave => $valor) {

                if ($clave == "id_producto") {
                    if ($valor == $idProduc) {
                        $valor = +$cantidad;
                    }
                }
            }
        } else {
            $pedido = new Pedidos();
        }
        $pedido->detallePedidos->add($dc);
        session()->put('pedido', $pedido);
        return redirect("/");
    }


    function hacerCompra(){
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
                $pedido->save();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
        } else {
            $this->middleware('auth');
        }
    }
}

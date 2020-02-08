<?php

namespace App\Http\Controllers;

use App\Producto;
use App\DetallePedido;
use Exception;
use App\Pedidos;
use DateTime;
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
        $bool = false;
        if (isset($pedido)) {
            $det =  $pedido->detallePedidos;
            foreach ($det as $item) {
                if ($item->id_producto == $idProduc) {
                    $item->cantidad  += $cantidad;
                    $bool = true;
                }
            }
        } else {
            $pedido = new Pedidos();
        }
        if ($bool == false) {
            $pedido->detallePedidos->add($dc);
        }
        session()->put('pedido', $pedido);
        return redirect("/");
    }


    function hacerCompra()
    {
        echo("entra en subir DB");
        if (auth()->user()) {
            echo("hay usuario </br>");
            DB::beginTransaction();
            try {
                echo("entra en el try");
                $pedido =  session()->get('pedido');
                $pedido->id_usuario = auth()->user()->id_usuario;
                $pedido->fechaPedido = (new DateTime())->format('Y-m-d');
                $pedido->save();
                foreach ($pedido->detallePedidos as $val) {
                    $val->id_pedido = $pedido->id_pedido;
                    $val->save();
                }
           
                DB::commit();

               return redirect("/");
            } catch (Exception $e) {
                DB::rollBack();
            }
        } else {
            echo("no hay user");
          return redirect("/home");
        }
    }
}

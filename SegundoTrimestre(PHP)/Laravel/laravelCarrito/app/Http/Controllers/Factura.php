<?php

namespace App\Http\Controllers;

use App\DetallePedido;
use App\Pedidos;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class Factura extends Controller
{
    public function __construct()
    {
    }
    function listarFactura()
    {

        $iduser =  auth()->user()->id_usuario;

        $listaped =  Pedidos::where("id_usuario", "=", $iduser)->get();


        return view('facturaPed', compact('listaped'));
    }
    function detallesFactura(Request $request)
    {
        if (auth()->user()) {
        $idPed = $request->input('id');
        echo ($idPed);
        $ped = Pedidos::find($idPed);
        $listadetalles = $ped->detallePedidos;
       return view('facturaDetPed', compact('listadetalles'));
    } else {
        echo("no hay user");
      return redirect("/home");
    }
    }
}

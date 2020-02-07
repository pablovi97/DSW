<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verPedidos extends Controller
{
    function listarPedidos(){
        $pedido = session()->get('pedido');
        $detalleped = $pedido->detallePedidos;
        return view('listarPedido', compact('detalleped'));

    }
}

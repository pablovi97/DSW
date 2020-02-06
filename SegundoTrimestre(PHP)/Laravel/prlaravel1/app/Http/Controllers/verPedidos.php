<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verPedidos extends Controller
{
    function listarPedidos(Request $r)
    {
        if (auth()->user()) {
            $pedido = session('pedido');
            var_dump($pedido);
         
        }else{
            return redirect("/home");
        }
    }
}

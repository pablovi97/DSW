<?php

namespace App\Http\Controllers;

use DetallePedido;
use Illuminate\Http\Request;

class Factura extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function listarFactura()
    {
        return redirect("/");
        if (auth()->user()) {
            echo ("estas en listar factura!");
            $usuario = auth()->user();
            echo ($usuario);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class PedidoController extends Controller
{
   /**
         * @var Productos $producto
         *
         */


        public function __construct()
        {
    
        }
    
        function agregarProducto()
        {
        }
        function mostraritem(Request $request){
            $id =$request->input('id');
            $producto = Producto::find($id);
            return view('visorProducto',compact('producto'));
    
        }
}

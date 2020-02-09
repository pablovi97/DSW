<?php

namespace App\Http\Controllers;

use App\Comentarios;
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
           // $prueba = session()->get('prueba');
          //  echo $prueba;
           // die();

           $comentarios = Comentarios::all();
           $coment =  session()->get('coment');

           $coment  = $comentarios;
           session()->put('coment', $coment);
            $id =$request->input('id');
            $producto = Producto::find($id);
            return view('visorProducto',compact('producto'));
    
        }
}

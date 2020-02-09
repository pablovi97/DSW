<?php

namespace App\Http\Controllers;

use App\Comentarios;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class gestionComentarios extends Controller
{
    function validarComentario(Request $request)
    {

        if (auth()->user()) {


            $idproduct =  $request->input('idproduct');
            $contenido =  $request->input('contenido');


            $iduser = auth()->user()->id_usuario;

            $resultado = Producto::wherehas(
                'detallePedidos.pedido',
                function ($query) use ($iduser) {
                    $query->where('id_usuario', $iduser);
                }

            )->get();
            if (sizeof($resultado) > 0) {
               
                DB::beginTransaction();
                try {
                    echo ("entra en el try");
                    $comen = new Comentarios();
                    $comen->usuarioID = auth()->user()->id_usuario;
                    $comen->contenido = $contenido;
                    $comen->productoID = $idproduct;
                    $comen->save();
                    DB::commit();
        
                    return back();
                } catch (Exception $e) {
                    DB::rollBack();
                }

                $comentarios = Comentarios::all();
                $coment =  session()->get('coment');

                $coment  = $comentarios;
                session()->put('coment', $coment);
                return back();
            }else{
                return redirect("/");
            }
        } else {
            return redirect("/home");
        }
    }
}

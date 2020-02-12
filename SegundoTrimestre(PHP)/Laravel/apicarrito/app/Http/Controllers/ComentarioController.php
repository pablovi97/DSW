<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComentarioResource;
use App\Comentario;
use Exception;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET PARA TODOS
    public function index(Request $request)
    {

        if ($request->input('contenido') != null) {
            $parametroValue = $request->input('contenido');
            $ComentariosFiltrados = Comentario::where('contenido', 'like', $parametroValue)->get();
            return $ComentariosFiltrados;
        }
        if ($request->input('productoID') != null) {
            $parametroValue = $request->input('productoID');
            $ComentariosFiltrados = Comentario::where('productoID', 'like', $parametroValue)->get();
            return $ComentariosFiltrados;
        } 
        if ($request->input('usuarioID') != null) {
            $parametroValue = $request->input('usuarioID');
            $ComentariosFiltrados = Comentario::where('usuarioID', 'like', $parametroValue)->get();
            return $ComentariosFiltrados;
        }

        return ComentarioResource::collection(Comentario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //POST
    public function store(Request $request)
    {
        /*
        $Comentario = Comentario::create([
            'nombreComentario' =>  $request->nombreComentario,
            'stock' => $request->stock,
            ]);


            return new ComentarioResource($Comentario);
            */
        $Comentario = new Comentario();
        $Comentario->contenido = $request->contenido ?? $Comentario->contenido;
        $Comentario->productoID = $request->productoID ?? $Comentario->productoID;
        $Comentario->usuarioID = $request->usuarioID ?? $Comentario->usuarioID;
        $Comentario->save();
        return new ComentarioResource($Comentario);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    //GET PARA UN ID
    public function show(Comentario $Comentario)
    {
        return new ComentarioResource($Comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, Comentario $Comentario)
    {/*
        $Comentario->update($request->only(['nombreComentario', 'precio']));

*/
        $Comentario->contenido = $request->contenido ?? $Comentario->contenido;
        $Comentario->productoID = $request->productoID ?? $Comentario->productoID;
        $Comentario->usuarioID = $request->usuarioID ?? $Comentario->usuarioID;
        $Comentario->save();
        return new ComentarioResource($Comentario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy(Comentario $Comentario)
    {

        $Comentario->delete();


        return response()->json(null, 204);
    }
}

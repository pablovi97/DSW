<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoResource;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
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

        if ($request->input('id_usuario') != null) {
            $parametroValue = $request->input('id_usuario');
            $PedidosFiltrados = Pedido::where('id_usuario', 'like', $parametroValue)->get();
            return $PedidosFiltrados;
        }
        if ($request->input('fechaPedido') != null) {
            $parametroValue = $request->input('fechaPedido');
            $PedidosFiltrados = Pedido::where('fechaPedido', 'like', $parametroValue)->get();
            return $PedidosFiltrados;
        }

        return PedidoResource::collection(Pedido::all());
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
        $pedido = Pedido::create([
            'nombrePedido' =>  $request->nombrePedido,
            'stock' => $request->stock,
            ]);


            return new PedidoResource($pedido);
            */
        $pedido = new Pedido();
        $pedido->id_usuario = $request->id_usuario ?? $pedido->id_usuario;
        $pedido->fechaPedido = $request->fechaPedido ?? $pedido->fechaPedido;
        $pedido->save();
        return new PedidoResource($pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    //GET PARA UN ID
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, Pedido $pedido)
    {/*
        $pedido->update($request->only(['nombrePedido', 'precio']));

*/
        if ($request->user()->id_usuario == $pedido->id_usuario) {
            $pedido->id_usuario = $request->id_usuario ?? $pedido->id_usuario;
            $pedido->fechaPedido = $request->fechaPedido ?? $pedido->fechaPedido;
            $pedido->save();
            $pedido->save();
            return new PedidoResource($pedido);
        } else {
            return response()->json(['error' => 'You can only edit your own orders.'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy(Pedido $pedido)
    {

        $pedido->delete();


        return response()->json(null, 204);
    }
}

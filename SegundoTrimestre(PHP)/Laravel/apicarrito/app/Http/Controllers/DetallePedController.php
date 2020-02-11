<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetallepedResource;
use App\DetallePedido;
use Exception;
use Illuminate\Http\Request;

class DetallePedController extends Controller
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

        if ($request->input('id_pedido') != null) {
            $parametroValue = $request->input('id_pedido');
            $DetallePedidosFiltrados = DetallePedido::where('id_pedido', 'like', $parametroValue)->get();
            return $DetallePedidosFiltrados;
        }
        if ($request->input('id_producto') != null) {
            $parametroValue = $request->input('id_producto');
            $DetallePedidosFiltrados = DetallePedido::where('id_producto', 'like', $parametroValue)->get();
            return $DetallePedidosFiltrados;
        }
        if ($request->input('cantidad') != null) {
            $parametroValue = $request->input('cantidad');
            $DetallePedidosFiltrados = DetallePedido::where('cantidad', 'like', $parametroValue)->get();
            return $DetallePedidosFiltrados;
        }
        if ($request->input('precioProducto') != null) {
            $parametroValue = $request->input('precioProducto');
            $DetallePedidosFiltrados = DetallePedido::where('precioProducto', 'like', $parametroValue)->get();
            return $DetallePedidosFiltrados;
        }

        return DetallepedResource::collection(DetallePedido::all());
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
        $DetallePedido = DetallePedido::create([
            'nombreDetallePedido' =>  $request->nombreDetallePedido,
            'stock' => $request->stock,
            ]);


            return new DetallePedidoResource($DetallePedido);
            */
        $DetallePedido = new DetallePedido();
        $DetallePedido->id_pedido = $request->id_pedido ?? $DetallePedido->id_pedido;
        $DetallePedido->id_producto = $request->id_producto ?? $DetallePedido->id_producto;
        $DetallePedido->cantidad = $request->cantidad ?? $DetallePedido->cantidad;
        $DetallePedido->precioProducto = $request->precioProducto ?? $DetallePedido->precioProducto;
        $DetallePedido->save();
        return new DetallepedResource($DetallePedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetallePedido  $DetallePedido
     * @return \Illuminate\Http\Response
     */
    //GET PARA UN ID
    public function show(DetallePedido $DetallePedido)
    {
        return new DetallepedResource($DetallePedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetallePedido  $DetallePedido
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, DetallePedido $DetallePedido)
    {/*
        $DetallePedido->update($request->only(['nombreDetallePedido', 'precio']));

*/
        $DetallePedido->id_pedido = $request->id_pedido ?? $DetallePedido->id_pedido;
        $DetallePedido->id_producto = $request->id_producto ?? $DetallePedido->id_producto;
        $DetallePedido->cantidad = $request->cantidad ?? $DetallePedido->cantidad;
        $DetallePedido->precioProducto = $request->precioProducto ?? $DetallePedido->precioProducto;
        $DetallePedido->save();
        return new DetallepedResource($DetallePedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetallePedido  $DetallePedido
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy(DetallePedido $DetallePedido)
    {

        $DetallePedido->delete();


        return response()->json(null, 204);
    }
}

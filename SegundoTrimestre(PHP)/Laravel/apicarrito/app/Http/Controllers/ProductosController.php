<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Producto;
use Exception;
use Illuminate\Http\Request;

class ProductosController extends Controller
{


    public function __construct()
{
$this->middleware('auth:api')->except(['index','show']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET PARA TODOS
    public function index(Request $request)
    {

        if ($request->input('nombreProducto') != null) {
            $parametroValue = $request->input('nombreProducto');
            $productosFiltrados = Producto::where('nombreProducto', 'like', $parametroValue)->get();
            return $productosFiltrados;
        }
        if ($request->input('precio') != null) {
            $parametroValue = $request->input('precio');
            $productosFiltrados = Producto::where('precio', 'like', $parametroValue)->get();
            return $productosFiltrados;
        }

        return ProductoResource::collection(Producto::all());
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
        $producto = Producto::create([
            'nombreProducto' =>  $request->nombreProducto,
            'stock' => $request->stock,
            ]);


            return new ProductoResource($producto);
            */
        $producto = new Producto();
        $producto->nombreProducto = $request->nombreProducto ?? $producto->nombreProducto;
        $producto->stock = $request->stock ?? $producto->stock;
        $producto->url = $request->url ?? $producto->url;
        $producto->precio = $request->precio ?? $producto->precio;
        $producto->save();
        return new ProductoResource($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    //GET PARA UN ID
    public function show(Producto $producto)
    {
        return new ProductoResource($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, Producto $producto)
    {/*
        $producto->update($request->only(['nombreProducto', 'precio']));

*/
        $producto->nombreProducto = $request->nombreProducto ?? $producto->nombreProducto;
        $producto->stock = $request->stock ?? $producto->stock;
        $producto->url = $request->url ?? $producto->url;
        $producto->precio = $request->precio ?? $producto->precio;
        $producto->save();
        return new ProductoResource($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy(Producto $producto)
    {

        $producto->delete();


        return response()->json(null, 204);
    }
}

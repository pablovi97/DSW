@extends('layouts.default')
@section('content')

@isset($producto)
<div class="container text-center">
<h1 class="display-3">Tu pedido!</h1>

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@foreach ($pedido->detallePedidos as $det)

            <tr>
            <td scope="row">{{$det->id_producto}}</td>
                <td>{{$det->cantidad}}</td>
                <td>{{$det->precioProducto}}</td>
            </tr>
            @endforeach
        </tbody>
</table>





    <form action="/subirPedido" method="post">
        <input type="submit" class="btn btn-outline-Warning" value="Comprar">
        </form>
    
</div>

@endisset
@endsection

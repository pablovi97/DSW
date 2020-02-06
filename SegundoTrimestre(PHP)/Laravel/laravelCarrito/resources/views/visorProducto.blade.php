@extends('layouts.default')
@section('content')

@isset($producto)
<div class="container text-center">
<h1 class="display-3">{{$producto->nombreProducto}}</h1>
<p><img src="{{$producto->url}}" /></p>
<strong>precio : {{$producto->precio}}$</strong>
<form action="/pedido" method="POST">
<input type="text" value="{{$producto->idProducto}}" name="proid">
<input type="number" min="0" max="{{$producto->stock}}" step="1" name="produ">
<input type="submit" class="btn btn-info" value="Enviar">
</form>
</div>

@endisset
@endsection

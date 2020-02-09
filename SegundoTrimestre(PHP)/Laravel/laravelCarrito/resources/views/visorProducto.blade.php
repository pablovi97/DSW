@extends('layouts.default')
@section('content')
<div class="container ">
@isset($producto)
<div class="row">
    <div class="col-12 text-center">
<h1 class="display-3">{{$producto->nombreProducto}}</h1>
<p><img src="{{$producto->url}}" /></p>
<strong>precio : {{$producto->Precio}}$</strong>
<form action="/pedido" method="POST">
    <input id="proid" name="proid" type="hidden" value="{{$producto->idProducto}}">
<input type="number" min="0" max="{{$producto->stock}}" step="1" name="produ">
<input type="submit" class="btn btn-info" value="Enviar">
</form>
<div class="col-12 py-4 text-center">
<ul class="list-group">
 
    @if(null !==  session()->get('coment'))
    <?php $coment =  session()->get('coment') ?>
    @foreach ($coment as $com)
    @if($com->productoID == $producto->idProducto )
    <li class="list-group-item">{{$com->usuarioID}} : {{$com->contenido}}</li>
    @endif
    @endforeach
    @endif
</ul>

<h3 >Comenta que te ha parecido el producto!</h3>
    <form action="/comentarios" method="post">
        <input id="idproduct" name="idproduct" type="hidden" value="{{$producto->idProducto}}">
        <textarea name="contenido" id="" cols="30" rows="10"></textarea></br>
        <button type="submit" class="btn btn-outline-success">Enviar</button>
    </form>
</div>


    </div>
</div>
@endisset

</div>
@endsection
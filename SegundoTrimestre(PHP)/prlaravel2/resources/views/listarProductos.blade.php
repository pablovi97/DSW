@extends('layouts.default')
@section('content')
<div class="row text-center">
@foreach ($productos as $item)
<div class="item col-6 ">
    <h1 class="display-3"> {{$item->nombreProducto}}</h1>
 <p><strong>{{$item->Precio}}€</strong></p>
 

    <a href="/mostrarproducto?id={{$item->idProducto}}"><img src="{{$item->url}}" /></a>
   

</div>
@endforeach

{{$productos->links()}}

@endsection
<div class="col-12 py-2 bg-info">

<form action="/verPedidos" method="post">
    <input type="submit" class="btn btn-outline-Warning" value="Comprar">
    </form>
</div>
</div>


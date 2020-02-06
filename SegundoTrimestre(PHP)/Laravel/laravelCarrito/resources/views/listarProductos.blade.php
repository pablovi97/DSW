
<div class="container "><div class="row">
    <div class="contenido ">
    @extends('layouts.default')
@section('content')
@foreach ($productos as $item)
<ul>
    <li class="display-3" style="list-style:none">
        {{$item->nombreProducto}}
    </li>
    <li style="list-style:none">
        {{$item->Precio}}$
    </li>

    <li style="list-style:none">
    <a href="/mostrarproducto?id={{$item->idProducto}}"><img src="{{$item->url}}" /></a>
    </li>

</ul>

@endforeach

{{$productos->links()}}

@endsection
</div>
<form action="/subirPedido" method="post">
<input type="submit" class="btn btn-outline-success" value="ver!">
</form>

<a href="/home"><button class="btn btn-outline-info" value="" >Sign in!</button></a>

<a href="/register"><button class="btn btn-outline-warning" value="" >Sign up!</button>    </a>    
<form action="/logout" method="post">
    <input type="submit" class="btn btn-outline-danger" value="Sign out!">
    </form>
</div></div>
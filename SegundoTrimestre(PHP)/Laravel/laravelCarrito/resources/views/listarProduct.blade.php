
<div class="container "><div class="row">
    <div class="contenido ">
    @extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center">
@foreach ($productos as $item)
<ul>
    <li class="display-3" style="list-style:none">
        {{$item->nombreProducto}}
    </li>
    <li style="list-style:none">
        {{$item->Precio}}$
    </li>

    <li style="list-style:none">
    <a href="/mostrarproducto?id={{$item->idProducto}}"><img src="{{$item->url}}" width="450px"  height="300px"/></a>
    </li>

</ul>

@endforeach
</div>
<div class="d-flex justify-content-center">
{{$productos->links()}}
</div>
@endsection
</div>


</div></div>
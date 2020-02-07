
    @extends('layouts.default')
@section('content')
<div class="d-flex justify-content-center col-12">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
           
          </tr>
        </thead>
        <tbody>
@foreach ($detalleped as $item)
<tr>
<th scope="row">{{$item->id_producto}}</th>
    <td>{{$item->cantidad}}</td>
    <td>{{$item->precioProducto}}</td>
  </tr>
@endforeach
</tbody>
</table>

</div>
<button class="btn btn-sm btn-warning ">  <a class="nav-link" href="/subirBDD">Comprar!</a></button>
@endsection


    @extends('layouts.default')
  
    @section('content')
    <div class="container d-flex justify-content-center ">
   <div class="row">
       <div class="col-12"><h1 class="Dsiplay-2">Historial de pedidos!</h1></div>
    @foreach ($listaped as $item)
    <div class="col-12">
    <a href="/facturaDet?id={{$item->id_pedido}}">{{$item}}</a>
    </div>
    @endforeach
   
    
    </div>
</div>
    @endsection
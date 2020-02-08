
    @extends('layouts.default')
    @section('content')
    <div class=" container d-flex justify-content-center col-12">
        <div class="row">
        <div class="col-12"><h1 class="Dsiplay-2">Factura!</h1></div>
        <div class="col-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
               
              </tr>
            </thead>
            <tbody>
                <?php $res = 0; ?>
    @foreach ($listadetalles as $item)
    <tr>
    <th scope="row">{{$item->id_producto}}</th>
        <td>{{$item->cantidad}}</td>
        <td>{{$item->precioProducto}}</td>
      </tr>
      <?php $res += $item->cantidad * $item->precioProducto; ?>
    @endforeach
    <tr>
        <th >Total:</th>
            <td></td>
            <td>{{$res}}</td>
          </tr>
    </tbody>
    </table>
</div>
    </div>
</div>
    @endsection
    
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'idkeyMostrada' => $this->id_pedido,
            'idusuario' => $this->id_usuario,
            'fechaPedido' => $this->fechaPedido,
            
            ];
    }
}

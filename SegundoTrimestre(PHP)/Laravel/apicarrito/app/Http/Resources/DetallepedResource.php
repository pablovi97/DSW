<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetallepedResource extends JsonResource
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
            'idkeyMostrada' => $this->id_detallepedido,
            'idpedido' => $this->id_pedido,
            'id_producto' => $this->id_producto,
            'cantidad' => $this->cantidad,
            ];
    }
}

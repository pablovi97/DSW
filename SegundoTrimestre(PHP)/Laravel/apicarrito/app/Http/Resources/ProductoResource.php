<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            'idkeyMostrada' => $this->idProducto,
            'nombreKeyMostrada' => $this->nombreProducto,
            'precioKeyMostrada' => $this->precio,
            'stockKeyMostrada' => $this->stock,
            ];
    }
}

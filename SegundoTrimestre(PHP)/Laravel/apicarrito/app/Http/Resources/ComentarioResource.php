<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
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
            'idkeyMostrada' => $this->comentarioID,
            'contenido' => $this->contenido,
            'productoID' => $this->productoID,
            'usuarioID' => $this->usuarioID,
            ];
    }
}

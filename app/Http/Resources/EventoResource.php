<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
            'ciudad' => $this->ciudad,
            'direccion' => $this->direccion,
            'tipo' => $this->tipo,
            'aforo' => $this->aforomax,
            'nummaxentradas' => $this->nummaxentradas,
            'categoria' => $this->categoria->nombre
        ];
    }
}

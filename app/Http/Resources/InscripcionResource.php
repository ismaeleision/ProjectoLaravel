<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InscripcionResource extends JsonResource
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
            'evento_id' => $this->evento->nombre,
            'numentradas' => $this->numentradas,
            'estado' => $this->estado,
        ];
    }
}

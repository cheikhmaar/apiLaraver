<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Inscription extends JsonResource
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
            'date' => $this->date,
            'anneAcademique' => $this->anneAcademique,
            'etudiant_id' => $this->etudiant_id,
            'etudiant' => $this->etudiant,
            'classe_id' => $this->classe_id,
            'classe' => $this->classe,
        ];
    }
}

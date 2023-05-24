<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Classe extends JsonResource
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
            'libelle' => $this->libelle,
            'droitInscription' => $this->droitInscription,
            'mensualite' => $this->mensualite,
            'autreFrais' => $this->autreFrais,
            'filiere_id' => $this->filiere_id,
            'filiere' => $this->filiere,
        ];
    }
}

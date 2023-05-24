<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Etudiant extends JsonResource
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
            'matricule' => $this->matricule,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'email' => $this->email,
            'dateNaiss' => $this->dateNaiss,
            'tel' => $this->tel,
        ];
    }
}

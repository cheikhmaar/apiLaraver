<?php

namespace App\Models;

use App\Models\Filiere;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
   // use HasFactory;
   protected $fillable=['libelle','droitInscription',
   'mensualite','autreFrais','filiere_id'];

    public function inscription(){
        return $this->hasMany(Inscription::class);
    }
    
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
}
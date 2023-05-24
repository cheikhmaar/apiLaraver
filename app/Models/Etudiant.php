<?php

namespace App\Models;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
   // use HasFactory;
   protected $fillable=['matricule','prenom',
   'nom','email','dateNaiss','tel'];

   public function inscription(){
       return $this->hasMany(Inscription::class);
   }
}
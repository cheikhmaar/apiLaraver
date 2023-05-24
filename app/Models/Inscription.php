<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    //use HasFactory;
    protected $fillable=['date','anneAcademique',
   'classe_id','etudiant_id'];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
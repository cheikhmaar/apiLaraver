<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    //use HasFactory;
    protected $fillable=['libelle'];

    public function classe(){
        return $this->hasMany(Classe::class);
    }
}

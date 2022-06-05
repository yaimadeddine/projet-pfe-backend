<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $table ='fournisseur';
    public $timestamps = false;

    
    protected $fillable = [
        'name',
        'adresse',
        'phone',
        'libelle',
    ];

    public function contrats ()
    {
        return $this->hasMany(Contrat::class);
    }
    
    

}

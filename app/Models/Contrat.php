<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ='contrat';



    protected $fillable = [
        'matricule',
        'date',
        'date_garantie',
        'fournisseur_id',
    ];


    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }

    public function fournisseur ()
    {
        return $this->belongsTo(Fournisseur::class);
    }
    public function fourniture()
    {
        return $this->hasMany(Fourniture::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourniture extends Model
{
    use HasFactory;

    protected $table ='fourniture';
    public $timestamps = false;


    protected $fillable = [
        'matricule',
        'prix',
        'type_fourniture_id',
        'materiel_id',
        'contrat_id',
        'marque_id',
    ];

    public function typeFourniture ()
    {
        return $this->belongsTo(TypeFourniture::class);
    }
    public function materiel ()
    {
        return $this->belongsTo(Materiel::class);
    }
    public function contrat ()
    {
        return $this->belongsTo(Contrat::class);
    }

    public function marque ()
    {
        return $this->belongsTo(Marque::class);
    }

}

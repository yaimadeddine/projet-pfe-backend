<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $table ='marque';
    public $timestamps = false;


    protected $fillable = [
        'name',
        'libelle',
    ];



    public function materiels ()
    {
        return $this->hasMany(Materiel::class);
    }
    public function fourniture()
    {
        return $this->hasMany(Fourniture::class);
    }
}

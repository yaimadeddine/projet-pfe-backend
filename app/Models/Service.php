<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table ='service';

    protected $fillable = [
        'name',
        'matricule',
    ];

    public function salle ()
    {
        return $this->hasOne(Salle::class);
    }

}

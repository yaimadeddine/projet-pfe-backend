<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table ='post';
    public $timestamps = false;

    protected $fillable = [
        'matricule',
        'user_id',
        'salle_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }

}

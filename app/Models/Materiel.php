<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table ='materiel';
    public $timestamps = false;


    protected $fillable = [
        'matricule',
        'prix',
        'type_id',
        'post_id',
        'contrat_id',
        'marque_id',
    ];

    public function type ()
    {
        return $this->belongsTo(Type::class);
    }
    public function post ()
    {
        return $this->belongsTo(Post::class);
    }
    public function contrat ()
    {
        return $this->belongsTo(Contrat::class);
    }

    public function marque ()
    {
        return $this->belongsTo(Marque::class);
    }
    public function ticket ()
    {
        return $this->hasMany(Ticket::class);
    }

    public function fourniture()
    {
        return $this->hasMany(Fourniture::class);
    }


}

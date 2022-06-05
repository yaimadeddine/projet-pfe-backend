<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    
    protected $table ='salle';

    public $timestamps = false;

    protected $fillable = [
        'numero',
        'service_id',
    ];

    public function posts ()
    {
        return $this->hasMany(Post::class);
    }

    public function service () 
    {
        return $this->belongsTo(Service::class);
    }
}

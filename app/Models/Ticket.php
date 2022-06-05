<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    protected $table ='ticket';


    protected $fillable = [
        'status',
        'commentaire',
        'material_id',
        'tech_id',
        'date_fin',
    ];


   public function materiel ()
   {
       return $this->belongsTo(Materiel::class);
   }
   public function technicien ()
   {
       return $this->belongsTo(User::class);
   }

}

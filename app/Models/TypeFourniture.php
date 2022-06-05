<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFourniture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table ='type_fourniture';

    protected $fillable = [
        'name',
    ];

    public function fourniture()
    {
        return $this->hasMany(Fourniture::class);
    }
}

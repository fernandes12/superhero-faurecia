<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    use HasFactory;

    protected $fillable = [
        'real_name',
        'hero_name',
        'publisher',
        'date',
    ];

    //All the abilities that belongs to a superhero
    public function abilities()
    {
        return $this->belongsToMany(Ability::class); 
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;

    //All the superheros that belongs to this ability
    public function superheros()
    {
        return $this->belongsToMany(Superhero::class); 
    }
}

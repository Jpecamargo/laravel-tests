<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['image','name','description'];

    public function consoles(){
        return $this->belongsToMany(Console::class);
    }
}

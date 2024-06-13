<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zh extends Model
{
    protected $fillable = ['id','zh'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }

}
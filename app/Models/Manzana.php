<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    protected $fillable = ['id','codigo_man'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}

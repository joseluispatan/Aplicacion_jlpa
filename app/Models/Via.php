<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    protected $fillable = ['id','nombre', 'ancho'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }

}

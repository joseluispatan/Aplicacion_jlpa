<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = ['id','codigo_dis'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }

}

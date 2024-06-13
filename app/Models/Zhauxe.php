<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zhauxe extends Model
{
    protected $fillable = ['id','zona', 'revestimiento', 'valor'];
    
    public function predios(){
    return $this->hasMany(Predio::class);
}

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $fillable = [
                 'propietari', 
                 'numero',
                 'ci',
                 'urbanizaci',
                 'manzana_id',
                 'registro',
                 'suptestimonio',
                 'supemedici',
                 'supcedida',
                 'suputil',
                 'tros',
                 'zona',
                 'lote',
                 'nro',
                 'titular_id',
                 'via_id',
                 'topografico_id',
                 'forma_id',
                 'ubicacion_id',
                 'servicio_id',
                 'ff_id',
                 'vz',
                 'nombrevia',
                 'paterno',
                 'materno',
                 'nombre1',
                 'nombre2',
                 'tipo_doc_id',
                 'nat_jur_id',
                 'razon_social_id',
                 'dom_titular_id',
                 'titularidad_id',
                 'doc_propiedad',
                 'adquisicion_id',
                 'equipamiento_id',
                 'frrente',
                 'fondo',
                 'observaciones',
                 'revestimiento_id',
                 'norte',
                 'sur',
                 'este',
                 'oeste',
                 'vt',
                 'zhauxe_id',
                 'zh_id',
                 'distrito_id',
                 'energia'

    ];

    //Relacion uno a muchos
    public function zh()
    {
        return $this->belongsTo(Zh::class);
    }
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
    public function manzana()
    {
        return $this->belongsTo(Manzana::class);
    }
    public function via()
    {
        return $this->belongsTo(Via::class);
    }

}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Via;
use App\Models\Manzana;
use App\Models\Distrito;
use App\Models\Predio;
use App\Models\Zh;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$prediosos = Predio::all();
        $predios = Predio::latest('id');
        

        return view('admin.predios.index', compact('predios'));
        //return view('admin.predios.prediosos', compact('prediosos'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(Predio $predio)
    {
        //
    }

    public function edit($id)
    {
        $predio = Predio::find($id);
        $zhs = Zh::all();
        $distritos = Distrito::all();
        $manzanas = Manzana::all();
        $vias = Via::all();
               
        return view('admin.predios.edit', compact('predio', 'zhs', 'distritos', 'manzanas', 'vias'));

    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $predio = Predio::find($id);
        
        // Array con los campos que se quieren actualizar
        $campos = [
                 'propietari', 
                 'numero',
                 'ci',
                 'urbanizaci',
                 'manzana_id',
                 'registro',
                 'suptestimo',
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
                 'frente',
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
    
        foreach ($campos as $campo) {
            $predio->$campo = $request->$campo;
        }

        $predio->save();
        

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El predio se actualizó correctamente.',
        ]);
       return redirect()->route('admin.predios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Predio $predio)
    {
        //
    }
}

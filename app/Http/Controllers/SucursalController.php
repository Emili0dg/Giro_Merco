<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalController extends Controller
{
    public function index($idzona)
    {
        $sucursal = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.nombre_sucursal as nombre_sucursal',
            'su.horario as horario',
            'su.telefono as telefono',
            'su.mapa as mapa',
            'su.como_llegar as como_llegar',
            'su.id_zona as id_zona',
            'zo.nombre_zona as nombre_zona',
        )
        ->leftjoin('zonas as zo', 'zo.id', '=', 'id_zona')
        ->where('su.id_zona', $idzona)
        ->get();
        
        return view('ZONASUCURSAL.sucursal', ['sucursal' => $sucursal]);
    }

    public function create()
    {
        $sucursal = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        return view('ZONASUCURSAL.create', ['sucursal' => $sucursal]);
    }

    public function store(Request $request)
    {
        $sucursales = new Sucursal();
        $sucursales->nombre_sucursal = $request->nombre_sucursal;
        $sucursales->horario = $request->horario;
        $sucursales->telefono = $request->telefono;
        $sucursales->mapa = $request->mapa;
        $sucursales->como_llegar = $request->como_llegar;
        $sucursales->id_zona = $request->id_zona;
        $sucursales->save();
        return redirect()->route('sucursal.show');
    }

    public function show()
    {
        $sucursal = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.nombre_sucursal as nombre_sucursal',
            'su.horario as horario',
            'su.telefono as telefono',
            'su.mapa as mapa',
            'su.como_llegar as como_llegar',
            'su.id_zona as id_zona',
            'zo.nombre_zona as nombre_zona',
        )
        ->leftjoin('zonas as zo', 'zo.id', '=', 'id_zona')
        ->get();
        
        return view('ZONASUCURSAL.show', ['sucursal' => $sucursal]);
    }

    public function edit(string $id)
    {
        $sucursales = Sucursal::find($id);
        $data = [
            'sucursales'=>$sucursales
        ];

        $zona = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        return view('ZONASUCURSAL.edit', $data, ['zona' => $zona]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sucursales = Sucursal::find($id);
        $sucursales->nombre_sucursal = $request->nombre_sucursal;
        $sucursales->horario = $request->horario;
        $sucursales->telefono = $request->telefono;
        $sucursales->mapa = $request->mapa;
        $sucursales->como_llegar = $request->como_llegar;
        $sucursales->id_zona = $request->id_zona;
        $sucursales->save();
        return redirect()->route('sucursal.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Sucursal::find($id);
        $delete->delete();
        return redirect()->route('sucursal.show');
    }
}

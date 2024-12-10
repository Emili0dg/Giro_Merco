<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados =  DB::table('estados as es')->select(
            'es.id as id',
            'es.nombre_estado as nombre_estado',
        )
        ->get();

        return view('ESTADOS.index', [
            'estado' => $estados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ESTADOS.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estados = new Estado();
        $estados->nombre_estado = $request->nombre_estado;
        $estados->save();

        return redirect()->route('estados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = Estado::find($id);

        $tabla_estados =  DB::table('estados as es')->select(
            'es.id as id',
            'es.nombre_estado as nombre_estado',
        )
        ->get();

        return view('ESTADOS.index', [
            'estado' => $estados,
            'tabla_estados' => $tabla_estados,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estados = Estado::find($id);
        $estados->nombre_estado = $request->nombre_estado;
        $estados->save();

        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

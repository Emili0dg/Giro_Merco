<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZonasController extends Controller
{
    public function index()
    {
        $zonas = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();
        return view('ZONAS.zona', ['zonas' => $zonas]);
    }

    public function create()
    {
        return view('ZONAS.create');
    }

    public function store(Request $request)
    {
        $zona = new Zona();
        $zona->nombre_zona = $request->nombre_zona;
        $zona->save();
        return redirect('/admin/zona');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $zona = Zona::find($id);
        $data = [
            'zonas'=>$zona
        ];
        return view('ZONAS.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $zona = Zona::find($id);
        $zona->nombre_zona = $request->nombre_zona;
        $zona->save();
        return redirect('/admin/zona');
    }

    public function destroy(string $id)
    {
        $delete = Zona::find($id);
        $delete->delete();
        return redirect('/admin/zona');
    }
}

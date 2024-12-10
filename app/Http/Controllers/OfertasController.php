<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\Ofertas_imagen;
use App\Models\Ofertas_zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oferta_zonas = DB::table('ofertas_zonas as ofz')->select(
            'of.id as id_oferta',
            'ofz.id_zona as id_zona',
            'ofz.id_sucursal as id_sucursal',
            'ofi.imagen as imagen',
        )
        ->leftjoin('ofertas as of', 'of.id', '=', 'ofz.id_oferta')
        ->leftjoin('ofertas_imagens as ofi', 'of.id', '=', 'ofi.id_oferta')
        ->get();

        return view('OFERTAS/ofertas', ['oferta_zonas' => $oferta_zonas]);
    }

    public function create()
    {
        $zona = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        $sucursal = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.id_zona as id_zona',
            'su.nombre_sucursal as nombre_sucursal',
        )
        ->leftJoin('zonas as zo', 'zo.id', '=', 'su.id_zona')
        ->get();

        return view('OFERTAS/create', [
            'zona' => $zona,
            'sucursal' => $sucursal
        ]);
    }

    public function store(Request $request)
    {
        $oferta = new Ofertas();
        $oferta->fecha = $request->fecha;
        $oferta->tipo = $request->tipo;
        $oferta->habilitado = $request->habilitado;
        $oferta->save();

        $oferta_imagen = new Ofertas_imagen();
        $oferta_imagen->id_oferta = $oferta->id;
        $oferta_imagen->imagen = $request->imagen;
        $oferta_imagen->save();

        if($request->zona == null) {
            foreach ($request->sucursal as $id_sucursal) {
                $oferta_zona = new Ofertas_zona();
                $oferta_zona->id_oferta = $oferta->id;
                $oferta_zona->id_zona = $request->id_zona;
                $oferta_zona->id_sucursal = $id_sucursal;
                $oferta_zona->save();
            }
        }else {
            foreach ($request->zona as $id_zona) {
                foreach ($request->sucursal as $id_sucursal) {
                    $oferta_zona = new Ofertas_zona();
                    $oferta_zona->id_oferta = $oferta->id;
                    $oferta_zona->id_zona = $id_zona;
                    $oferta_zona->id_sucursal = $id_sucursal;
                    $oferta_zona->save();
                }
            }    
        }

        return redirect()->route('ofertas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $edit = Ofertas::find($id);

        $ofertas = DB::table('ofertas as of')->select(
            'of.id as id',
            'ofz.id_zona as id_zona',
            'ofz.id_sucursal as id_sucursal',
            'ofi.imagen as imagen',
        )
        ->leftJoin('ofertas_zonas as ofz', 'of.id', '=', 'ofz.id_oferta')
        ->leftJoin('ofertas_imagens as ofi', 'of.id', '=', 'ofi.id_oferta')
        ->get();

        $zona = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        $sucursal = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.id_zona as id_zona',
            'su.nombre_sucursal as nombre_sucursal',
        )
        ->leftJoin('zonas as zo', 'zo.id', '=', 'su.id_zona')
        ->get();

        return view('OFERTAS/edit', [
            'edit' => $edit,
            'zona' => $zona,
            'sucursal' => $sucursal,
            'oferta' => $ofertas,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $oferta = Ofertas::find($id);
        $oferta->fecha = $request->fecha;
        $oferta->tipo = $request->tipo;
        $oferta->habilitado = $request->habilitado;
        $oferta->save();

        $oferta_imagen = Ofertas_imagen::where('id_oferta', $oferta->id)->first();
        $oferta_imagen->imagen = $request->imagen;
        $oferta_imagen->save();

        if($request->zona == null) {
            foreach ($request->sucursal as $id_sucursal) {
                $oferta_zona = Ofertas_zona::where('id_oferta', $oferta->id)->first();
                $oferta_zona->id_oferta = $oferta->id;
                $oferta_zona->id_zona = $request->id_zona;
                $oferta_zona->id_sucursal = $id_sucursal;
                $oferta_zona->save();
            }
        }else {
            foreach ($request->zona as $id_zona) {
                foreach ($request->sucursal as $id_sucursal) {
                    $oferta_zona = Ofertas_zona::where('id_oferta', $oferta->id)->first();
                    $oferta_zona->id_oferta = $oferta->id;
                    $oferta_zona->id_zona = $id_zona;
                    $oferta_zona->id_sucursal = $id_sucursal;
                    $oferta_zona->save();
                }
            }    
        }

        return redirect()->route('ofertas.index');
    }

    public function destroy(string $id)
    {
        $destroy = Ofertas::find($id);
        $destroy->delete();
        return redirect()->route('ofertas.index');
    }
}

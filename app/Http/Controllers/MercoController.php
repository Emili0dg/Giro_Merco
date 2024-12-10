<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class MercoController extends Controller
{
    public function index(){
        $zonas = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        $sucursales = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.nombre_sucursal as nombre_sucursal',
        )
        ->get();

        return view('index', [
            'sucursal' => $sucursales,
            'zona' => $zonas
        ]);
    }

    public function ofertas(){
        $zonas = DB::table('zonas as zo')->select(
            'zo.id as id',
            'zo.nombre_zona as nombre_zona',
        )
        ->get();

        $sucursales = DB::table('sucursals as su')->select(
            'su.id as id',
            'su.nombre_sucursal as nombre_sucursal',
        )
        ->get();

        return view('ofertas', [
            'sucursal' => $sucursales,
            'zona' => $zonas
        ]);
    }
}

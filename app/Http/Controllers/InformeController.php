<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeController extends Controller
{
    public function index()
    {
        $informe = DB::table('vehicles as v')
            ->join('drivers as d', 'd.person_id', 'v.driver_id')
            ->join('owners as o', 'o.person_id', 'v.owner_id')
            ->join('persons as pd', 'pd.id', 'd.person_id')
            ->join('persons as po', 'po.id', 'o.person_id')
            ->select(
                'v.placa',
                'v.marca',
                DB::raw('CONCAT(pd.primer_nombre, " ", pd.segundo_nombre, " ", pd.apellidos) as conductor'),
                DB::raw('CONCAT(po.primer_nombre, " ", po.segundo_nombre, " ", po.apellidos) as propietario')
            )
            ->get();
        return response()->json($informe, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

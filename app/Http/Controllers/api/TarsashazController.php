<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarsashaz;

class TarsashazController extends Controller
{
    public function getTarsashaz()
    {
        $tarsashaz = Tarsashaz::all();
        return response()->json($tarsashaz);
    }
    public function addTarsashaz(Request $request)
    {
        $tarsashaz = new Tarsashaz();
        $tarsashaz->nev = $request->nev;
        $tarsashaz->alapito_dokumentum = $request->alapito_dokumentum;
        $tarsashaz->szavazasi_szabaly = $request->szavazasi_szabaly;
        $tarsashaz->save();
        return response()->json($tarsashaz);
    }
    public function updateTarsashaz(Request $request, $id)
    {
        $tarsashaz = Tarsashaz::find($id);
        $tarsashaz->nev = $request->nev;
        $tarsashaz->alapito_dokumentum = $request->alapito_dokumentum;
        $tarsashaz->szavazasi_szabaly = $request->szavazasi_szabaly;
        $tarsashaz->update();
        return response()->json($tarsashaz);
    }
    public function deleteTarsashaz($id)
    {
        $tarsashaz = Tarsashaz::find($id);
        $tarsashaz->delete();
        return response()->json($tarsashaz);
    }
}

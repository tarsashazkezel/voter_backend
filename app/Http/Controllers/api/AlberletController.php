<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alberlet;

class AlberletController extends Controller
{
    public function getAlberlet(){
        $alberlet = Alberlet::all();
        return response()->json($alberlet);
    }
    public function addAlberlet(Request $request){
        $alberlet = new Alberlet();
        $alberlet->nev = $request->nev;
        $alberlet->cim = $request->cim;
        $alberlet->helyrajzszam = $request->helyrajzszam;
        $alberlet->save();
        return response()->json($alberlet);
    }
    public function updateAlberlet(Request $request, $id){
        $alberlet = Alberlet::find($id);
        $alberlet->nev = $request->nev;
        $alberlet->cim = $request->cim;
        $alberlet->helyrajzszam = $request->helyrajzszam;
        $alberlet->update();
        return response()->json($alberlet);
    }
    public function deleteAlberlet($id){
        $alberlet = Alberlet::find($id);
        $alberlet->delete();
        return response()->json($alberlet);
    }
}

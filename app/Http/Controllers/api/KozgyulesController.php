<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kozgyules;

class KozgyulesController extends Controller
{
    public function getKozgyules(){
        $kozgyules = Kozgyules::all();
        return response()->json($kozgyules);
    }
    public function addKozgyules(Request $request){
        $kozgyules = new Kozgyules();
        $kozgyules->datum = $request->datum;
        $kozgyules->megnyitva = $request->megnyitva;
        $kozgyules->save();
        return response()->json($kozgyules);
    }
    public function updateKozgyules(Request $request, $id){
        $kozgyules = Kozgyules::find($id);
        $kozgyules->datum = $request->datum;
        $kozgyules->megnyitva = $request->megnyitva;
        $kozgyules->update();
        return response()->json($kozgyules);
    }
    public function deleteKozgyules($id){
        $kozgyules = Kozgyules::find($id);
        $kozgyules->delete();
        return response()->json($kozgyules);
    }
}

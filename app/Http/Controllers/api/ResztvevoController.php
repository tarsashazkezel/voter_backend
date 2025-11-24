<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resztvevo;

class ResztvevoController extends Controller
{
    public function getResztvevo(){
        $resztvevo = Resztvevo::all();
        return response()->json($resztvevo);
    }
    public function addResztvevo(Request $request){
        $resztvevo = new Resztvevo();
        $resztvevo->kozgyules_id = $request->kozgyules_id;
        $resztvevo->tulajdonos_id = $request->tulajdonos_id;
        $resztvevo->meghatalmazott = $request->meghatalmazott;
        $resztvevo->meghatalmazott_tulajdonos_id = $request->meghatalmazott_tulajdonos_id;
        $resztveve->erkezes_idopont = $request->erkezes_idopont;
        $resztvevo->kilepes_idopont = $request->kilepes_idopont;
        $resztvevo->save();
        return response()->json($resztvevo);
    }
    public function updateResztvevo(Request $request,$id){
        $resztvevo = Resztvevo::find($id);
        $resztvevo->kozgyules_id = $request->kozgyules_id;
        $resztvevo->tulajdonos_id = $request->tulajdonos_id;
        $resztvevo->meghatalmazott = $request->meghatalmazott;
        $resztvevo->meghatalmazott_tulajdonos_id = $request->meghatalmazott_tulajdonos_id;
        $resztveve->erkezes_idopont = $request->erkezes_idopont;
        $resztvevo->kilepes_idopont = $request->kilepes_idopont;
        $resztvevo->update();
        return response()->json($resztvevo);
    }

    public function destroyResztvevo($id){
        $resztvevo = Resztvevo::find($id);
        $resztvevo->delete();
        return response()->json($resztvevo);
    }

}

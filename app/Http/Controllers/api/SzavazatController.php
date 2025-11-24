<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Szavazat;

class SzavazatController extends Controller
{
    public function getSzavazat(){
        $szavazat = Szavazat::all();
        return response()->json($szavazat);
    }

    public function addSzavazat(Request $request){
        $szavazat = new Szavazat();
        $szavazat->napirendi_pont_id = $request["napirendi_pont_id"];
        $szavazat->resztvevo_id = $request["resztvevo_id"];
        $szavazat->szavazat = $request["szavazat"];
        $szavazat->idopont = $request["idopont"];
        $szavazat->save();
        return response()->json($szavazat);
    }
    public function updateSzavazat(Request $request, $id){
        $szavazat = Szavazat::find($id);
        $szavazat->napirendi_pont_id = $request["napirendi_pont_id"];
        $szavazat->resztvevo_id = $request["resztvevo_id"];
        $szavazat->szavazat = $request["szavazat"];
        $szavazat->idopont = $request["idopont"];
        $szavazat->update();
        return response()->json($szavazat);
    }
    public function deleteSzavazat($id){
        $szavazat = Szavazat::find($id);
        $szavazat->delete();
        return response()->json($szavazat);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Felszolalas;

class FelszolalasController extends Controller
{
    public function getFelszolalas(){
        $felszolalas = Felszolalas::all();
        return response()->json($felszolalas);
    }
    public function addFelszolalas(Request $request){
        $felszolalas = new Felszolalas();
        $felszolalas->resztvevo_id = $request->resztvevo_id;
        $felszolalas->napirendi_pont_id = $request->napirendi_pont_id;
        $felszolalas->szoveg = $request->szoveg;
        $felszolalas->idopont = $request->idopont;
        $felszolalas->save();
        return response()->json($felszolalas);
    }
    public function updateFelszolalas(Request $request, $id){
        $felszolalas = Felszolalas::find($id);
        $felszolalas->resztvevo_id = $request->resztvevo_id;
        $felszolalas->napirendi_pont_id = $request->napirendi_pont_id;
        $felszolalas->szoveg = $request->szoveg;
        $felszolalas->idopont = $request->idopont;
        $felszolalas->update();
        return response()->json($felszolalas);
    }
    public function deleteFelszolalas($id){
        $felszolalas = Felszolalas::find($id);
        $felszolalas->delete();
        return response()->json($felszolalas);
    }
}

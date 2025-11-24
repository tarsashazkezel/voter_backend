<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Napirendi_pont;

class Napirendi_pontController extends Controller
{
    public function getNapirendi_pont(){
        $napirendi_pont = Napirendi_pont::all();
        return response()->json($napirendi_pont);
    }
    public function addNapirendi_pont(Request $request){
        $napirendi_pont = new Napirendi_pont();
        $napirendi_pont->kozgyules_id = $request->kozgyules_id;
        $napirendi_pont->sorszam = $request->sorszam;
        $napirendi_pont->megnevezes = $request->megnevezes;
        $napirendi_pont->aktiv = $request->aktiv;
        $napirendi_pont->lezart = $request->lezart;
        $napirendi_pont->save();
        return response()->json($napirendi_pont);
    }
    public function updateNapirendi_pont(Request $request,$id){
        $napirendi_pont = Napirendi_pont::find($id);
        $napirendi_pont->kozgyules_id = $request->kozgyules_id;
        $napirendi_pont->sorszam = $request->sorszam;
        $napirendi_pont->megnevezes = $request->megnevezes;
        $napirendi_pont->aktiv = $request->aktiv;
        $napirendi_pont->lezart = $request->lezart;
        $napirendi_pont->update();
        return response()->json($napirendi_pont);
    }
    public function deleteNapirendi_pont($id){
        $napirendi_pont = Napirendi_pont::find($id);
        $napirendi_pont->delete();
        return response()->json($napirendi_pont);
    }
}

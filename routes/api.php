<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TulajdonosController;
use App\Http\Controllers\api\SzavazatController;
use App\Http\Controllers\api\ResztvevoController;
use App\Http\Controllers\api\Napirendi_pontController;
use App\Http\Controllers\api\AlberletController;
use App\Http\Controllers\api\KozgyulesController;
use App\Http\Controllers\api\FelszolalasController;
use App\Http\Controllers\api\TarsashazController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/tulajdonos', [TulajdonosController::class, 'getTulajdonos']);
Route::post('/tulajdonos', [TulajdonosController::class, 'addTulajdonos']);
Route::put('/tulajdonos/{id}', [TulajdonosController::class, 'updateTulajdonos']);
Route::delete('/tulajdonos/{id}', [TulajdonosController::class, 'deleteTulajdonos']);

Route::get('/alberlet', [AlberletController::class, 'getAlberlet']);
Route::post('/alberlet', [AlberletController::class, 'addAlberlet']);
Route::put('/alberlet/{id}', [AlberletController::class, 'updateAlberlet']);
Route::delete('/alberlet/{id}', [AlberletController::class, 'deleteAlberlet']);

Route::get('/kozgyules', [KozgyulesController::class, 'getKozgyules']);
Route::post('/kozgyules', [KozgyulesController::class, 'addKozgyules']);
Route::put('/kozgyules/{id}', [KozgyulesController::class, 'updateKozgyules']);
Route::delete('/kozgyules/{id}', [KozgyulesController::class, 'deleteKozgyules']);

Route::get('/felszolalas', [FelszolalasController::class, 'getFelszolalas']);
Route::post('/felszolalas',[FelszolalasController::class, 'addFelszolalas']);
Route::put('/felszolalas/{id}', [FelszolalasController::class, 'updateFelszolalas']);
Route::delete('/felszolalas/{id}', [FelszolalasController::class, 'deleteFelszolalas']);

Route::get('/tarsashaz', [TarsashazController::class, 'getTarsashaz']);
Route::post('/tarsashaz', [TarsashazController::class, 'addTarsashaz']);
Route::put('/tarsashaz/{id}', [TarsashazController::class, 'updateTarsashaz']);
Route::delete('/tarsashaz/{id}', [TarsashazController::class, 'deleteTarsashaz']);

Route::get('/szavazat', [SzavazatController::class, 'getSzavazat']);
Route::post('/szavazat', [SzavazatController::class, 'addSzavazat']);
Route::put('/szavazat/{id}', [SzavazatController::class, 'updateSzavazat']);
Route::delete('/szavazat/{id}', [SzavazatController::class, 'deleteSzavazat']);

Route::get('/resztvevo', [ResztvevoController::class, 'getResztvevo']);
Route::post('/resztvevo', [ResztvevoController::class, 'addResztvevo']);
Route::put('/resztvevo/{id}', [ResztvevoController::class, 'updateResztvevo']);
Route::delete('/resztvevo/{id}', [ResztvevoController::class, 'destroyResztvevo']);

Route::get('/napirendipont', [Napirendi_pontController::class, 'getNapirendi_pont']);
Route::post('/napirendipont', [Napirendi_pontController::class, 'addNapirendi_pont']);
Route::put('/napirendipont/{id}', [Napirendi_pontController::class, 'updateNapirendi_pont']);
Route::delete('/napirendipont/{id}', [Napirendi_pontController::class, 'deleteNapirendi_pont']);
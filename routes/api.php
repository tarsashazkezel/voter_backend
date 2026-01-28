<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AgendaItemController;
use App\Http\Controllers\api\MeetingController;
use App\Http\Controllers\api\ResolutionController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\VoteController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('meetings', MeetingController::class);
    Route::apiResource('agenda-items', AgendaItemController::class)->except(['index','show']);

    Route::apiResource('resolutions', ResolutionController::class)->only(['store','show']);

    Route::post('/resolutions/{resolution}/vote', [VoteController::class, 'store']);
    Route::get('/resolutions/{resolution}/result', [VoteController::class, 'result']);

    Route::apiResource('users', UserController::class)->only(['index','show']);
    Route::get('/meetings/{meeting}/report', [MeetingController::class, 'report']);
});

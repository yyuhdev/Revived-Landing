<?php

use App\Http\Controllers\PlayerSearchController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/api/player/{uuid}', [PlayerSearchController::class, 'getStats'])->name('player.stats');

Route::get('/api/player/profile/{name}', function ($name) {
    $req = Http::get("https://api.mojang.com/users/profiles/minecraft/{$name}");
    return $req->json();
})->name('player.stats');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

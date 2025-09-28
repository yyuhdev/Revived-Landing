<?php

use App\Http\Controllers\PlayerSearchController;
use App\Http\Controllers\StatType;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/stats/global', [PlayerSearchController::class, 'getGlobalStats'])
    ->name('api.stats.global');

Route::get('/stats/{uuid}', [PlayerSearchController::class, 'getStats'])
    ->name('api.stats.player');

Route::get('/player/profile/{name}', function ($name) {
    $req = Http::get("https://api.mojang.com/users/profiles/minecraft/{$name}");
    return $req->json();
})->name('player.sctats');

Route::bind('stat', function ($value) {
    return StatType::tryFrom($value) ?? abort(404, 'Invalid stat type');
});

Route::prefix('leaderboard')
    ->group(function () {
        Route::get('/stats/{stat}', [PlayerSearchController::class, 'getLeaderboardStats']);
    });


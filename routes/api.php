<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GambarController;

Route::post('/uploadgambar', [GambarController::class, 'store']);
Route::get('/read_all', [GambarController::class, 'fetchAll']);

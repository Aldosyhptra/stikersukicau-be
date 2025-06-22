<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download/{filename}', function ($filename) {
    $path = public_path("gambar/{$filename}");

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->download($path);
});
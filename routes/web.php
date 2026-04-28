<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/upload/image', [UploadImageController::class, 'upload_image'])->name('upload.image');
Route::get('/upload+image', [UploadImageController::class, 'img_upload'])->name('img.upload');
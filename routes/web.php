<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/{id}', [MessageController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/postNote', [NoteController::class,'postNote'])->middleware(['auth'])->name('postnote');

Route::post('/postMessages',[MessageController::class,'postMessage'])->middleware(['auth'])->name('postmessage');

Route::get('/annonces', [AnnonceController::class,'annonces'])->middleware(['auth'])->name('annonces');

Route::get('upload-image', [UploadImageController::class, 'index']);
Route::post('save', [UploadImageController::class, 'save']);

require __DIR__.'/auth.php';

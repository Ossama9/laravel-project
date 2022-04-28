<?php

use App\Http\Controllers\BrandController as BrandController;
use App\Http\Controllers\DashboardController as DashboardController;
use App\Http\Controllers\ModeleController as ModeleController;
use App\Http\Controllers\PostController as PostController;
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


/*
Route::get('/dashboard/{id}', [MessageController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/postNote', [NoteController::class,'postNote'])->middleware(['auth'])->name('postnote');

Route::post('/postMessages',[MessageController::class,'postMessage'])->middleware(['auth'])->name('postmessage');

Route::get('/annonces', [AnnonceController::class,'annonces'])->middleware(['auth'])->name('annonces');

Route::get('upload-image', [UploadImageController::class, 'index']);
Route::post('save', [UploadImageController::class, 'save']);*/


// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');


// Route Creation Annonce
Route::get('/createPost', [PostController::class, 'createPost'])
    ->middleware(['auth'])
    ->name('createPost');

// Route Api Pour tous les models(A3,A4,G7)
Route::get('/getModels', [ModeleController::class, 'getModels'])
    ->name('getmodels');

// Route Api pour tous les marques
Route::get('/getBrands', [BrandController::class, 'getBrands'])
    ->name('getbrands');


// Route ModelBy Id
Route::get('/getModelById/{id}', [ModeleController::class, 'getModelById'])
    ->name('getModelById');


/*// Route Recuperer les models avec leur marques
Route::get('/brandByIdModel/{id}', [BrandController::class, 'brandByIdModel'])
    ->name('brand');*/

Route::get('/getModelByIdBrand/{id}', [ModeleController::class, 'getModelByIdBrand'])
    ->name('getModelByIdBrand');

Route::post('/submitPost', [PostController::class, 'submitPost'])
    ->middleware(['auth'])
    ->name('submitPost');

Route::get('/posts/', [PostController::class, 'posts'])
    ->name('posts');

Route::get('/post/{id}', [PostController::class, 'getPost'])
    ->name('post');



Route::get('/updatePost/{id}', [PostController::class, 'updatePost'])
    ->name('updatePost');



require __DIR__ . '/auth.php';
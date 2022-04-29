<?php

use App\Http\Controllers\BrandController as BrandController;
use App\Http\Controllers\ContactController as ContactController;
use App\Http\Controllers\DashboardController as DashboardController;
use App\Http\Controllers\MessageController as MessageController;
use App\Http\Controllers\ModeleController as ModeleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PostController as PostController;
use App\Http\Controllers\StripController as StripController;
use Illuminate\Http\Request;
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




Route::post('/postMessage', [MessageController::class, 'postMessage'])->middleware(['auth'])->name('postMessage');

Route::post('/postNote', [NoteController::class, 'postNote'])->middleware(['auth'])->name('postNote');


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

Route::get('/filtre_cr', [PostController::class, 'filtre_cr'])
    ->middleware(['auth'])
    ->name('filtre_cr');

Route::get('/filtre_dcr', [PostController::class, 'filtre_dcr'])
    ->middleware(['auth'])
    ->name('filtre_dcr');

Route::get('/posts/', [PostController::class, 'posts'])
    ->middleware(['auth'])
    ->name('posts');

Route::get('/post/{id}', [PostController::class, 'getPost'])
    ->middleware(['auth'])
    ->name('post');


Route::get('/updatePost/{id}', [PostController::class, 'updatePost'])
    ->middleware(['auth'])
    ->name('updatePost');

Route::get('/deleteComment/{id}', [MessageController::class, 'deleteComment'])
    ->middleware(['auth'])
    ->name('deleteComment');

Route::get('/updatePost/{id}', [PostController::class, 'updatePost'])
    ->middleware(['auth'])
    ->name('updatePost');

Route::get('deletePost/{id}',[PostController::class,'deletePost'])
    ->middleware(['auth'])
    ->name('deletePost');


Route::get('contact/{id}',[ContactController::class,'contact'])
    ->middleware(['auth'])
    ->name('contact');

Route::post('sendEmail',[ContactController::class,'sendEmail'])
    ->middleware(['auth'])
    ->name('sendEmail');

Route::get('initPayement/{id}',[StripController::class,'initPayement'])
    ->middleware(['auth'])
    ->name('initPayement');


Route::post('postPayement',[StripController::class,'postPayement'])
    ->middleware(['auth'])
    ->name('postPayement');



require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/dishes', [DishController::class, 'index']);

Route::post('/dishes', [DishController::class, 'store']);

Route::get('/faker', function () {

    return view('faker');
});


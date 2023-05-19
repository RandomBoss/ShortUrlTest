<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

//Route::get('/', function () {
//    return view('index');
////    return view('welcome');
//});

Route::get('/', [MainController::class, 'index']);
Route::get('/getUrl', [MainController::class, 'getShortUrl']);
Route::get('/{key}', [MainController::class, 'urlRetrieve']);



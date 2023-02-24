<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientTreatmentController;
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

Route::get('/session/{admin}',[ClientController::class,'session'])->name('session');
Route::get('/session2/{center}',[ClientController::class,'session2'])->name('session2');
Route::get('/salir',[ClientController::class,'salir'])->name('salir');
// Route::get('/volverACentros',[CenterController::class,'volverACentros'])->name('volverACentros');

//Route::put('/aa/{id}',[ClientTreatmentController::class, 'addTreatment'])->name('tratamiento');

//Route::get('/add/{id}',[ClientTreatmentController::class, 'add'])->name('add');

Route::resource('tratamientoParaClientes',ClientTreatmentController::class);

Route::get('/center',[CenterController::class, 'index'])->name('center');

Route::resource('clientes',ClientController::class);

Route::get('/', function () {
    return view('admin');
})->name('welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/denied',function () {

    return view('denied');})->name('denied');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
<?php

use App\Http\Controllers\criteriaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SubCriteriaController;
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

Route::get('/', [homeController::class, 'index'])->name('dashboard');

Route::get('/criteria', [criteriaController::class, 'index'])->name('criteria');
Route::POST('/criteria', [criteriaController::class, 'store'])->name('tambah-criteria');
Route::put('/criteria/{id}', [criteriaController::class, 'update'])->name('update-criteria');
Route::get('/criteria/delete/{id}', [criteriaController::class, 'destroy'])->name('delete-criteria');

Route::get('/sub-criteria', [SubCriteriaController::class, 'index'])->name('subcriteria');
Route::POST('/sub-criteria', [SubCriteriaController::class, 'store'])->name('tambah-sub-criteria');
Route::put('/sub-criteria/{id}', [SubCriteriaController::class, 'update'])->name('update-sub-criteria');
Route::get('/sub-criteria/delete/{id}', [SubCriteriaController::class, 'destroy'])->name('delete-sub-criteria');

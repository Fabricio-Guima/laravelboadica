<?php

use App\Http\Controllers\PlanController;
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


//pesquisar planos
Route::any('admin/plans/search', [PlanController::class, 'search'])->name('plans.search');
//create plan
Route::get('admin/plans/create', [PlanController::class, 'create'])->name('plans.create');

//store plans 
Route::post('admin/plans/store', [PlanController::class, 'store'])->name('plans.store');

//index plans 
Route::get('admin/plans', [PlanController::class, 'index'])->name('plans.index');

//detalhes de um plano 
Route::get('admin/plans/{url}', [PlanController::class, 'show'])->name('plans.show');

//Excluir um plano 
Route::delete('admin/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');

//página de editar um plano 
Route::get('admin/plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');

//update de um plano 
Route::put('admin/plans/{url}/update', [PlanController::class, 'update'])->name('plans.update');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

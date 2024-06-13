<?php

use App\Http\Controllers\Admin\PredioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function(){
  return view('admin.dashboard');
})->name('dashboard');

Route::get('/predios/prediosos', function(){
  return view('admin.predios.prediosos');
});

Route::resource('/predios', PredioController::class);

Route::get('/predios/edit/{id}', [PredioController::class, 'edit']);



//    ->except('show');

//Route::get('/', function(){
  //  return view('admin.dashboard');
//})->middleware(['can:Acceso al dashboard'])
//    ->name('dashboard');

//Route::resource('/categories', CategoryController::class)
//    ->except('show');

//Route::resource('/posts', PostController::class)
//    ->except('show')
//    ->middleware(['can:Gestion de articulos']);

//Route::resource('/roles', RoleController::class)
//    ->except('show')
//    ->middleware(['can:Gestion de roles']);

//Route::resource('/permissions', PermissionController::class)
//    ->except('show')
//    ->middleware(['can:Gestion de permisos']);

//Route::resource('/users', UserController::class)
//    ->except('show', 'create', 'store')
//    ->middleware(['can:Gestion de usuarios']);
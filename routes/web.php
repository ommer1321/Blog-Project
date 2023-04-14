<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Auth::routes();



//Auth Contol
Route::group(['middleware' => ['auth']], function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home')->middleware('isRole');










// Task Route
Route::group(['prefix' => 'tasks'], function () {

Route::get('/', [App\Http\Controllers\Task\TaskController::class, 'index'])->name('index.task');
Route::get('/{task_id}', [App\Http\Controllers\Task\TaskController::class, 'detail'])->name('details.task');
Route::post('/store', [App\Http\Controllers\Task\TaskController::class, 'store'])->name('store.task');
Route::put('/delete/{task_id}', [App\Http\Controllers\Task\TaskController::class, 'delete'])->name('delete.task');
Route::put('/update/{task_id}', [App\Http\Controllers\Task\TaskController::class, 'update'])->name('update.task');

});



Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('index.category');
    Route::post('/category-store', [App\Http\Controllers\Category\CategoryController::class, 'categoryStore'])->name('store.category');
    Route::post('/category-delete/{id}', [App\Http\Controllers\Category\CategoryController::class, 'categoryDelete'])->name('delete.category');
    Route::post('/category-update/{id}', [App\Http\Controllers\Category\CategoryController::class, 'categoryUpdate'])->name('update.category');


    Route::post('/altcategory-store', [App\Http\Controllers\Category\CategoryController::class, 'altcategoryStore'])->name('store.altcategory');
    Route::post('/altcategory-delete/{id}', [App\Http\Controllers\Category\CategoryController::class, 'altcategoryDelete'])->name('delete.altcategory');
    Route::post('/altcategory-update/{id}', [App\Http\Controllers\Category\CategoryController::class, 'altcategoryUpdate'])->name('update.altcategory');

    
});



});





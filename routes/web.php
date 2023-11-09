<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/person',\App\Http\Controllers\PersonController::class);



Route::get('/business/trash',[\App\Http\Controllers\BusinessController::class,'trash'])->name('business.trash');
Route::delete('/business/{business}/force-delete',[\App\Http\Controllers\BusinessController::class,'forceDelete'])->name('business.forceDelete');
Route::resource('/business',\App\Http\Controllers\BusinessController::class);

Route::get('tasks',[\App\Http\Controllers\TaskController::class,'index'])->name('tasks.index');
Route::get('tasks/create',[\App\Http\Controllers\TaskController::class,'create'])->name('tasks.create');
Route::get('tasks/{task}/show',[\App\Http\Controllers\TaskController::class,'show'])->name('tasks.show');
Route::post('tasks/store',[\App\Http\Controllers\TaskController::class,'store'])->name('tasks.store');
Route::patch('tasks/{task}/completed',[\App\Http\Controllers\TaskController::class,'complete'])->name('tasks.complete');


require __DIR__.'/auth.php';

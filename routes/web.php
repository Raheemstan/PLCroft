<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\CashBookIndex;
use App\Http\Livewire\ExpenceIndex;
use App\Http\Livewire\IncomeIndex;
use App\Http\Livewire\TagIndex;
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
Route::middleware(['auth:sanctum', 'verified', 'role:phoenix|admin']) ->prefix('admin'
)->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index']) ->name('index');
    Route::get('Income', IncomeIndex::class) ->name('income.index');
    Route::get('Sales', TagIndex::class) ->name('tag.index');
    Route::get('Expences', ExpenceIndex::class) ->name('expence.index');
    Route::get('Analytics', CashBookIndex::class) ->name('cashbook.index');


});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

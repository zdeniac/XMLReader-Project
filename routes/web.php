<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\PersonLogController;
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
    return redirect()->route('persons.index');
});

Route::post('persons/store-without-transaction', [PersonController::class, 'storeWithoutTransaction'])
->name('persons.storeWithoutTransaction');
Route::resource('persons', PersonController::class)
    ->only([
        'index',
        'create',
        'store',
        'show',
    ]);

Route::resource('logs', PersonLogController::class)
    ->only([
        'index',
        'show'
    ]);
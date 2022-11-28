<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizerController;

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

Route::get('/organizers/list', [OrganizerController::class, 'list']);
Route::get('/organizers/create', [OrganizerController::class, 'create']);
Route::get('/organizers/{organizerId}', [OrganizerController::class, 'show']);

Route::post('/organizers', [OrganizerController::class, 'store'])->name('organizer.create');
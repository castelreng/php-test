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

Route::get('/organizer/list', [OrganizerController::class, 'list']);
Route::get('/organizer/create', [OrganizerController::class, 'create']);

Route::post('/organizer', [OrganizerController::class, 'store']);
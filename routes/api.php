<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\AdminApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Create Mapel - Admin
Route::get('/Okemin', 'AdminApiController@index');
Route::get('/Okemin/Mapel/Create', 'AdminApiController@showCreateMapel');
Route::post('/Okemin/Mapel/Create/Send', 'AdminApiController@createMapel');
// Show List Mapel - Admin
Route::get('/Okemin/Mapel/List', 'AdminApiController@showMapelList');
// Search Mapel - Admin
Route::get('/Okemin/Mapel/List/Search', 'AdminApiController@searchMapel');
// Edit Mapel - Okemin
Route::get('/Okemin/Mapel/Edit/{id}', 'AdminApiController@editMapel');
Route::put('/Okemin/Mapel/Update/{id}', 'AdminApiController@updateMapel');
// Delete Mapel - Okemin
Route::get('/Okemin/Mapel/Delete/{id}', 'AdminApiController@deleteMapel');

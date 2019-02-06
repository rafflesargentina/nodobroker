<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('brokers', 'BrokerController');
Route::apiResource('offer-types', 'OfferTypeController');
Route::apiResource('projects', 'ProjectController');
Route::apiResource('project-types', 'ProjectTypeController');
Route::apiResource('users', 'UserrController');

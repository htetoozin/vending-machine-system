<?php

use App\Http\Controllers\Api\AuthenticatedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthenticatedController::class, 'store']);
Route::post('/logout', [AuthenticatedController::class, 'logout']);

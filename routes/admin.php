<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminHomeController;

Route::get('', [AdminHomeController::class, 'index']);



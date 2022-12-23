<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource("topics", TopicController::class);
Route::apiResource("sections", SectionController::class);
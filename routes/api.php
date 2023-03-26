<?php

use App\Http\Controllers\SectionContentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectContentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::apiResource("topics", TopicController::class);
Route::apiResource("sections", SectionController::class);
Route::apiResource("section-contents", SectionContentController::class)->except(['show']);
Route::get("section-content/{section_id}/{laguage}", [SectionContentController::class, "show"]);
Route::apiResource("subjects", SubjectController::class);
Route::apiResource("subject-contents", SubjectContentController::class)->except("show");
Route::get("subject-contents/{subject_id}/{language}", [SubjectContentController::class, "show"]);

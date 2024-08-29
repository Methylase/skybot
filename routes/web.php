<?php
use App\Http\Controllers\SkybotServiceController;
Route::get('/skybot-count', [SkybotServiceController::class, 'index']);
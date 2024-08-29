<?php
use App\Http\Controllers\Api\SkybotServiceApiController;

Route::middleware('skybotservice.throttle:5,1')->group(function () {
    Route::get('/skybots', [SkybotServiceApiController::class, 'skybots']);
    Route::get('/posts/{skybotId}', [SkybotServiceApiController::class, 'posts']);
    Route::get('/comments/{postId}', [SkybotServiceApiController::class, 'comments']);
});
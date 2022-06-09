<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

Route::get('/', function () {
    return response()->json([
        "message" => "Welcome to the MailerLite API."
    ]);
});

Route::resource('subscribers', SubscriberController::class);
<?php

use Illuminate\Support\Facades\Route;
use AlephIt\BitbucketWebhook\BuildController;

Route::post("/build", BuildController::class);
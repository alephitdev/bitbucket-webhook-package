<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::post("/build", function(Request $request) {
    $data = collect($request->post());
    $branch = $data->has("pullrequest") ? "develop" : "master";
    $this->info("Deploying {$branch} branch");
    Artisan::call("build {$branch}");
    $this->info("Running database migration");
    Artisan::call("migrate --seed");
    $this->info("Deployment complete");
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::post("/build", function(Request $request) {
    $data = collect($request->post());
    $branch = $data->has("pullrequest") ? "develop" : "master";
    Artisan::call("build {$branch}");
});
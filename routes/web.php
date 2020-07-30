<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::post("/build", function(Request $request) {
    $data = collect($request->post());
    $branch = $data->has("pullrequest") ? "develop" : "master";
    echo "<pre>Deploying {$branch} branch</pre>";
    Artisan::call("build {$branch}");
    echo "<pre>Running database migration</pre>";
    Artisan::call("migrate --seed");
    echo "<pre>Deployment complete</pre>";
});
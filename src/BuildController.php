<?php

declare(strict_types = 1);

namespace AlephIt\BitbucketWebhook;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

final class BuildController
{
    public function __invoke(Request $request)
    {
        $data = collect($request->post());

        // @todo fix the actual branch
        $branch = $data->has("pullrequest") ? "develop" : "master";

        Artisan::call("build {$branch}");
    }
}
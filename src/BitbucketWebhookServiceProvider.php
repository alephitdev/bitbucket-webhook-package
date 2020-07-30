<?php

namespace AlephIt\BitbucketWebhook;

use Illuminate\Support\ServiceProvider;

final class BitbucketWebhookServiceProvider extends  ServiceProvider
{
    public function boot()
    {
        // console routes
        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                BuildCommand::class
            ]);
        }
    }
}
<?php

namespace AlephIt\BitbucketWebhook;

use Illuminate\Support\ServiceProvider;

final class BitbucketWebhookServiceProvider extends  ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
    }

    public function register()
    {
        $this->commands([
            BuildCommand::class
        ]);
    }
}
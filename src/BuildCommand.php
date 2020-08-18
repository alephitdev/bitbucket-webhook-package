<?php

namespace AlephIt\BitbucketWebhook;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BuildCommand extends Command
{
    protected $signature = "build {branch : The branch you want to build}";

    protected $description = "Build the project";

    public function handle()
    {
        $branch = $this->argument('branch');

        echo "<pre>Deploying {$branch} branch</pre>";

        shell_exec("git pull origin {$branch}");
        echo "<pre>Pulled changes from {$branch}<br></pre>";

        $output = shell_exec("composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader");
        echo "<pre>$output</pre>";

        echo "<pre>Running database migration</pre>";
        Artisan::call("migrate --seed");
        echo "<pre>Database migration complete</pre>";

        echo "<pre>Clearing Config, Cache, Config</pre>";
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        Artisan::call("config:clear");

        echo "<pre>Linking storage</pre>";
        Artisan::call("storage:link");

        echo "<pre>Caching content</pre>";
        Artisan::call("view:cache");
        Artisan::call("config:cache");
        Artisan::call("route:cache");

        echo "<pre>Deployment complete</pre>";
    }
}
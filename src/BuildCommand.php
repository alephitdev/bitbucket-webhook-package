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

        $output = shell_exec("git pull origin {$branch}");
        echo "<pre>$output</pre>";

        $output = shell_exec("composer install --no-dev");
        echo "<pre>$output</pre>";

        echo "<pre>Running database migration</pre>";
        Artisan::call("migrate --seed");
        echo "<pre>Database migration complete</pre>";

        echo "<pre>Deployment complete</pre>";
    }
}
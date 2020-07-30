<?php

namespace AlephIt\BitbucketWebhook;

use Illuminate\Console\Command;

class BuildCommand extends Command
{
    protected $signature = "build {branch : The branch you want to build}";

    protected $description = "Build the project";

    public function handle()
    {
        $branch = $this->argument('branch');

        $this->info("Deploying {$branch} branch");
        shell_exec("git pull origin {$branch}");
        $this->info("Running database migration");
        shell_exec("php artisan migrate");
        $this->comment("Deployment complete");
    }
}
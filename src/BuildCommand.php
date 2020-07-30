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

        $output = shell_exec("git pull origin {$branch}");
        echo "<pre>$output</pre>";
    }
}
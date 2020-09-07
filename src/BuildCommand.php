<?php

declare(strict_types=1);

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
        echo "<pre>Deploying {$branch} branch</pre><br>";

        $this->pullChanges($branch);
        $this->composerInstallation();
        $this->migrateAndSeedNecessaryData();
        $this->purgeCache();

        echo "<pre>Deployment complete</pre><br>";
    }

    private function pullChanges(string $branch): void
    {
        shell_exec("git pull origin {$branch}");
        echo "<pre>Pulled changes from {$branch}<br></pre>";
    }

    private function composerInstallation(): void
    {
        $noDev = "--no-dev";
        $noInteraction = "--no-interaction";
        $preferDist = "--prefer-dist";
        $optimizedAutoloader = "--optimize-autoloader";
        $output = shell_exec("composer install {$noDev}  {$noInteraction} {$preferDist} {$optimizedAutoloader}");
        echo "<pre>$output</pre>";
    }

    private function migrateAndSeedNecessaryData(): void
    {
        echo "<pre>Running database migration</pre>";
        Artisan::call("migrate --seed");
        echo "<pre>Database migration complete</pre>";
    }

    private function purgeCache(): void
    {
        echo "<pre>Clearing Config, Cache, Config</pre>";
        Artisan::call("view:clear");
        Artisan::call("config:clear");
        Artisan::call("route:clear");
        Artisan::call("cache:clear");

        echo "<pre>Caching content</pre>";
        Artisan::call("view:cache");
        Artisan::call("config:cache");
        Artisan::call("route:cache");
    }

    private function linkStorage(): void
    {
        echo "<pre>Linking storage</pre>";
        Artisan::call("storage:link");
    }
}
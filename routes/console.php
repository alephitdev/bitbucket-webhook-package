<?php

Artisan::command('build {branch}', function ($branch) {
    $this->info("Building {$branch}!");
    shell_exec("git pull origin {$branch}");
    shell_exec("php artisan migrate");
})->describe('Build the project');
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all the commands needed to get the project started.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec('composer install');
        exec('php artisan serve');
        exec('cd frontend');
        exec('npm install');
        exec('npm run dev');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppInitialization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initialization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this task to install dependanceis and run migrations and run seedars';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         //install composer debendansies
         exec('composer update');

         //migrate database
         $this->call('migrate:fresh');
 
         //seed fake data if there is no data
         
             $this->call('db:seed');
             $this->call('storage:link');
         
 
         //run application
         $this->info('You can access API from: http://127.0.0.1:8000/');
         $this->call('serve');
    }
}

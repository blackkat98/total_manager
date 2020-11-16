<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeRepositoryStackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repostack {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Repository classes for a Model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('model');

        if (!$this->modelExist($model)) {
            $this->line('<fg=white;bg=red>Model does not exist.</>');
            return;
        }

        if ($this->filesExist($model)) {
            $this->line('<fg=white;bg=red>Repository class or interface already exists.</>');
        } else {
            Artisan::call('make:repository', [
                'model' => $model
            ]);
            $this->line('<fg=green>Repository successfully created.</>');

            Artisan::call('make:repository_contract', [
                'model' => $model
            ]);
            $this->line('<fg=green>Repository Contract successfully created.</>');

            Artisan::call('make:repository_bind', [
                'model' => $model
            ]);
            $this->line('<fg=green>Repository binding successfully made.</>');
        }
    }
    
    /**
     * Check if the files to create already exist
     * 
     * @param string $model_name
     * 
     * @return bool
     */
    private function filesExist($model_name)
    {
        $repository = app_path() . '\Repositories\Classes\\' . $model_name . 'Repository.php';
        $contract = app_path() . '\Repositories\Interfaces\\' . $model_name . 'RepositoryContract.php';

        return file_exists($repository) || file_exists($contract);
    }

    /**
     * Check if the Model exist
     * 
     * @param string $model_name
     * 
     * @return bool
     */
    private function modelExist($model_name)
    {
        return file_exists(app_path() . '\Models\\' . $model_name . '.php');
    }
}

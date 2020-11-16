<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepositoryContractCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository_contract {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the repository pattern interface for a Model';

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
        $template = $this->getStub();
        $dest = app_path() . '\Repositories\Interfaces\\' . $model . 'RepositoryContract.php';
        copy($template, $dest);
        file_put_contents($dest, str_replace('Dummy', $model, file_get_contents($dest)));
    }

    /**
     * Get the interface template
     * 
     * @return string
     */
    private function getStub()
    {
        return app_path() . '\Stubs\repository_contract.stub';
    }
}

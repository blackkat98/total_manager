<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepositoryBindCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository_bind {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the binding of Repository class and interface';

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
        $target = app_path() . '\Providers\AppServiceProvider.php';
        $content = str_replace('Dummy', $model, file_get_contents($template));
        file_put_contents($target, str_replace('// Repositories above', $content, file_get_contents($target)));
    }

    /**
     * Get the interface template
     * 
     * @return string
     */
    private function getStub()
    {
        return app_path() . '\Stubs\repository_bind.stub';
    }
}

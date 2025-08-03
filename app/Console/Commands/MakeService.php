<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : O nome da classe de Service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Garante que o nome termine com "Service"
        $className = str_ends_with($name, 'Service') ? $name : "{$name}Service";

        $path = app_path("Services/{$className}.php");

        if (File::exists($path)) {
            $this->error("Service {$className} já existe!");
            return Command::FAILURE;
        }

        // Garante que a pasta Services existe
        File::ensureDirectoryExists(app_path('Services'));

        // Conteúdo básico da classe
        $stub = <<<PHP
        <?php

        namespace App\Services;

        class {$className}
        {
            //
        }
        PHP;

        File::put($path, $stub);

        $this->info("Service {$className} successfully created in app/Services!");

        return Command::SUCCESS;
    }
}

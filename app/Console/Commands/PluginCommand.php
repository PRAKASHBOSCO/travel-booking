<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PluginCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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
        if (file_exists(public_path('plugins'))) {
            return $this->error('The "public/plugins" directory already exists.');
        }

        $this->laravel->make('files')->link(
            app_path('Plugins'), public_path('plugins')
        );

        $this->info('The [public/plugins] directory has been linked.');
    }
}

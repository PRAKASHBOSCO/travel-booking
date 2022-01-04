<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ThemeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:link';

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
        $theme = 'goya';
        if (file_exists(public_path('themes/' . $theme))) {
            return $this->error('The "public/themes" directory already exists.');
        }

        $this->laravel->make('files')->link(
            app_path('Themes/' . ucfirst($theme) . '/Assets'), public_path('themes/' . $theme)
        );

        $this->info('The [public/themes] directory has been linked.');
    }
}

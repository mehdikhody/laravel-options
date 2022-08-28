<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;

class OptionHasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:has {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Determine if the given option value exists.';

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
     * @return int
     */
    public function handle()
    {
        $key = $this->argument('key');

        if (Option::has($key)) $this->info('Option ' . $key . ' exists.');
        else $this->info('Option ' . $key . ' not exists.');

        return 0;
    }
}

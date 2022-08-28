<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;

class OptionSetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:set {key} {value*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a given option value.';

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
        $value = implode($this->argument('value'), ' ');

        Option::set($key, $value);
        $this->info($key . ' set to ' . $value . '.');

        return 0;
    }
}

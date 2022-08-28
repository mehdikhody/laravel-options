<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;

class OptionGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:get {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the specified option value.';

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
        $value = Option::get($key, 'undefined');

        $this->info($key . ' is ' . $value . '.');

        return 0;
    }
}

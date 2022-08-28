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
        if (Option::has($key)) {
            $value = Option::get($key);
            if ($value === true) $value = 'true';
            if ($value === false) $value = 'false';
            $this->info($value);
            return 0;
        }

        $this->warn('There is no data.');
        return 0;
    }
}

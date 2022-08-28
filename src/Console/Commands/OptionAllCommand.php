<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Models\Option;

class OptionAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all options.';

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
        $options = Option::all();
        if ($options->count() > 0) {
            $header = array_keys($options[0]->getAttributes());
            $this->table($header, $options->toArray());
            return 0;
        }

        $this->warn('There is no data.');
        return 0;
    }
}

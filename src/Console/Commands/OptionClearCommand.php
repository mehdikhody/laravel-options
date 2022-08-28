<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;
use Mehdikhody\Options\Seeders\OptionSeeder;

class OptionClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove/delete all the options.';

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
        Option::clear();
        $this->info('Options removed.');

        return 0;
    }
}
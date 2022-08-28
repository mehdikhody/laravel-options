<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;

class OptionRemoveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:remove {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove/delete the specified option value.';

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
        Option::remove($key);

        $this->info($key . ' has been deleted.');

        return 0;
    }
}

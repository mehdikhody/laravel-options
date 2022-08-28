<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Database\Seeders\OptionSeeder;

class OptionSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the options table.';

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
        $this->call('db:seed', [
            '--class' => OptionSeeder::class
        ]);

        return 0;
    }
}

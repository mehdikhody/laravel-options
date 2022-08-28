<?php

namespace Mehdikhody\Options\Console\Commands;

use Illuminate\Console\Command;
use Mehdikhody\Options\Facades\Option;

class OptionInfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'option:info {key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the option model info.';

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
            $model = Option::getModel($key);
            $this->table(
                array_keys($model->getAttributes()),
                [$model->getAttributes()]
            );
        } else {
            $this->warn('undefined');
        }

        return 0;
    }
}

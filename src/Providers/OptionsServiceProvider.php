<?php

namespace Mehdikhody\Options\Providers;

use Illuminate\Support\ServiceProvider;
use Mehdikhody\Options\Models\Option;
use Mehdikhody\Options\Console\Commands\OptionSetCommand;
use Mehdikhody\Options\Console\Commands\OptionGetCommand;
use Mehdikhody\Options\Console\Commands\OptionHasCommand;
use Mehdikhody\Options\Console\Commands\OptionRemoveCommand;
use Mehdikhody\Options\Console\Commands\OptionInfoCommand;
use Mehdikhody\Options\Console\Commands\OptionClearCommand;

class OptionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('option', Option::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->publishes([__DIR__ . '/../Config/option.php' => config_path('option.php')]);
        $this->commands([
            OptionSetCommand::class,
            OptionGetCommand::class,
            OptionHasCommand::class,
            OptionRemoveCommand::class,
            OptionInfoCommand::class,
            OptionClearCommand::class
        ]);
    }
}

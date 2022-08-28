<?php

namespace Mehdikhody\Options\Facades;

use Illuminate\Support\Facades\Facade;
use Mehdikhody\Options\Models\Option as Model;

/**
 * @method static void set(string $key, mixed $value)
 * @method static bool has(string $key)
 * @method static mixed get(string $key, mixed $default = null)
 * @method static Model getModel(string $key)
 * @method static void remove(string $key)
 * @method static void clear()
 *
 * @see \Mehdikhody\Options\Models\Option
 */
class Option extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'option';
    }
}

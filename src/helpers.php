<?php

use Mehdikhody\Options\Facades\Option;
use Mehdikhody\Options\Models\Option as Model;

if (!function_exists('option_set')) {
    /**
     * Set a given option value.
     *
     * @param string $key
     * @param $value
     * @return void
     */
    function option_set(string $key, $value): void
    {
        Option::set($key, $value);
    }
}

if (!function_exists('option_get')) {
    /**
     * Get the specified option value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function option_get(string $key, $default = null)
    {
        return Option::get($key, $default);
    }
}

if (!function_exists('option_has')) {
    /**
     * Determine if the given option value exists.
     *
     * @param string $key
     * @return bool
     */
    function option_has(string $key): bool
    {
        return Option::has($key);
    }
}

if (!function_exists('option_remove')) {
    /**
     * Remove/delete the specified option value.
     *
     * @param string $key
     * @return void
     */
    function option_remove(string $key): void
    {
        Option::remove($key);
    }
}

if (!function_exists('option_get_model')) {
    /**
     * Get the option model instance.
     *
     * @param string $key
     * @return Model
     */
    function option_get_model(string $key): Model
    {
        return Option::getModel($key);
    }
}

if (!function_exists('option_clear')) {
    /**
     * Remove/delete all the options.
     *
     * @return void
     */
    function option_clear(): void
    {
        Option::clear();
    }
}

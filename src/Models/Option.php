<?php

namespace Mehdikhody\Options\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'json'
    ];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('option.table', 'options'));
    }

    /**
     * Set a given option value.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value): void
    {
        $this->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Determine if the given option value exists.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return $this->where('key', $key)->exists();
    }

    /**
     * Get the specified option value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        if ($option = $this->where('key', $key)->first()) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Remove/delete the specified option value.
     *
     * @param string $key
     * @return void
     */
    public function remove(string $key): void
    {
        $this->where('key', $key)->delete();
    }

    /**
     * Get the option model instance.
     *
     * @param string $key
     * @return Option
     */
    public function getModel(string $key): Option
    {
        return $this->where('key', $key)->first();
    }

    /**
     * Remove/delete all the options.
     *
     * @return void
     */
    public function clear(): void
    {
        DB::table($this->table)->truncate();

        $options = config('option.options', []);
        foreach ($options as $key => $value) {
            $this->set($key, $value);
        }
    }
}

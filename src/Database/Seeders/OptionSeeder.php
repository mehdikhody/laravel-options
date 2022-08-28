<?php

namespace Mehdikhody\Options\Database\Seeders;

use Illuminate\Database\Seeder;
use Mehdikhody\Options\Facades\Option;

class OptionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = config('option.options');
        foreach ($options as $key => $value) {
            Option::set($key, $value);
        }
    }
}

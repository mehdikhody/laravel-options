<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Mehdikhody\Options\Database\Seeders\OptionSeeder;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('option.table', 'options'), function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->json('value');
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => OptionSeeder::class]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('option.table', 'options'));
    }
}

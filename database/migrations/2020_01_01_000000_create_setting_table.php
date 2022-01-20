<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id('setting_id');
            $table->string('setting_key', 190);
            $table->string('setting_name', 190);
            $table->integer('setting_order')
                ->nullable();
            $table->string('setting_input', 190)
                ->nullable();
            $table->text('setting_value')
                ->nullable();
            $table->boolean('setting_removable')
                ->default(1);

            //$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}

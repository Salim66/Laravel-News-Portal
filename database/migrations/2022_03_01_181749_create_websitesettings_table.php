<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websitesettings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ban')->nullable();
            $table->text('footer_desc_en')->nullable();
            $table->text('footer_desc_ban')->nullable();
            $table->text('phone_en')->nullable();
            $table->text('phone_ban')->nullable();
            $table->text('email')->nullable();
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
        Schema::dropIfExists('websitesettings');
    }
};

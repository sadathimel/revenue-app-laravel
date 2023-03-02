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
        Schema::create('delay_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_billing_id')->references('id')->on('campaign_billings')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('0_to_59')->unsigned()->nullable()->comment("0 to 59 days after matured");
            $table->integer('60_to_89')->unsigned()->nullable()->comment("60 to 89 days after matured");
            $table->integer('90_to_119')->unsigned()->nullable()->comment("90 to 119 days after matured");
            $table->integer('120_to_500')->unsigned()->nullable()->comment("120 to 500 days after matured");
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
        Schema::dropIfExists('delay_dates');
    }
};

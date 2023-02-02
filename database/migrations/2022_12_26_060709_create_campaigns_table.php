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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('client_id')->references('id')->on('clients');
            $table->string('title', '200');
            $table->text('description')->nullable();
            $table->year('year');
            $table->integer('month')->references('id')->on('months');
            $table->string('estimate_no', 255)->nullable();
            $table->string('bill_no', 255)->nullable();
            $table->date('bill_submission_date')->nullable();
            $table->integer('pending_day')->nullable();
            $table->date('maturity_date')->nullable();
            $table->bigInteger('unbilled_amount')->unsigned()->nullable()->default(0);
            $table->bigInteger('gross')->unsigned()->nullable()->comment('basic amount');
            $table->bigInteger('client_commission_in')->unsigned()->default(0);
            $table->bigInteger('client_commission')->unsigned()->default(0);
            $table->bigInteger('net')->unsigned()->nullable()->comment('after calculating commission');
            $table->bigInteger('vat')->unsigned()->nullable()->comment('after calculating vat(%)');
            $table->bigInteger('vatd')->unsigned()->nullable()->comment('after calculating vat(%)');
            $table->bigInteger('bill_amount')->nullable()->default(0)->comment('after calculating vat');
            $table->string('payment_status')->default('FALSE');
            $table->bigInteger('received_amount')->nullable()->default(0)->comment('how much amount received');
            $table->string('chq_num', 255)->nullable();
            $table->date('chq_rec_date')->nullable()->comment('CHQ received date');
            $table->bigInteger('cheque_amount')->unsigned()->nullable();
            $table->string('cheque_image', 255)->nullable();
            $table->bigInteger('due')->unsigned()->nullable()->default(0);
            $table->integer('day_0_to_59')->unsigned()->nullable()->comment("0 to 59 days after matured");
            $table->integer('day_60_to_89')->unsigned()->nullable()->comment("60 to 89 days after matured");
            $table->integer('day_90_to_119')->unsigned()->nullable()->comment("90 to 119 days after matured");
            $table->integer('day_120_to_500')->unsigned()->nullable()->comment("120 to 500 days after matured");
            $table->text('remark')->nullable();
            $table->integer('created_by')->references('id')->on('users');
            $table->integer('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('campaigns');
    }
};

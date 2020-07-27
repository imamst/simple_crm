<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('agent_id');
            $table->unsignedSmallInteger('landlord_id')->nullable();
            $table->string('contract_number');
            $table->string('rent_duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_term');
            $table->text('contract_file')->nullable();
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('landlord_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}

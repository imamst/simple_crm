<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('profession')->nullable();
            $table->string('company')->nullable();
            $table->integer('income')->nullable();
            $table->text('photo')->nullable();
            $table->string('filling_form_token')->nullable();
            $table->unsignedMediumInteger('contract_id');
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}

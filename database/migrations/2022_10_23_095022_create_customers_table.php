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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
          // $table->foreignId('company_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_phone');
            $table->timestamps();
          // $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

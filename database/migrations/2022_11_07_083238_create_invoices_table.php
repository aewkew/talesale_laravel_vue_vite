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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
         // $table->foreignId('user_id')->constrained();
            $table->string('number')->unique();
            $table->string('customer_id');
            $table->date('date');
            $table->date('due_date');
            $table->string('reference')->nullable();
            $table->text('terms_and_conditions');
            $table->double('sub_total');
            $table->double('tax_total');
            $table->double('discount')->default(0);
            $table->double('total');
            $table->enum('status', ['pending','success','cancelled'])->default('pending');
            $table->timestamps(); 
            $table->foreign('user_id')->references('id')->on('users');
        });     
    }
  
    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
       
    }
};

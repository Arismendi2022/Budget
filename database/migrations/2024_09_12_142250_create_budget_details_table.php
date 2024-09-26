<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up():void{
      Schema::create('budget_details',function(Blueprint $table){
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('currency',3)->default('USD');
        $table->enum('currency_placement',['Symbol First','Symbol Last','Symbol None'])->default('Symbol First');
        $table->string('number_format')->default('123,456.78');
        $table->string('date_format')->default('MM/DD/YYYY');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down():void{
      Schema::dropIfExists('budget_details');
    }
  };

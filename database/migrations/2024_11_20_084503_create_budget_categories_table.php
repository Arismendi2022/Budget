<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up():void{
      Schema::create('budget_categories',function(Blueprint $table){
        $table->id();
        $table->foreignId('group_id')->references('id')->on('budget_groups')->onDelete('cascade');
        $table->string('name')->unique();
        $table->integer('ordering')->default(1000);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down():void{
      Schema::dropIfExists('budget_categories');
    }
  };

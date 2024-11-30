<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up():void{
      Schema::create('budget_accounts',function(Blueprint $table){
        $table->id();
        $table->foreignId('budget_id')->constrained()->cascadeOnDelete();
        $table->string('nickname')->unique();
        $table->text('notes')->nullable();
        $table->string('account_group');
        $table->string('data_account_type');
        $table->string('account_type');
        $table->decimal('balance',10,2);
        $table->decimal('interest',5,2)->default(0);
        $table->decimal('payment',10,2)->default(0);
        $table->integer('ordering')->default(1000);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down():void{
      Schema::dropIfExists('budget_accounts');
    }
  };

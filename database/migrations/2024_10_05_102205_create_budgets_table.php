<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
          $table->id();
          $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->string('name')->unique();
          $table->string('currency',3);
          $table->string('currency_placement');
          $table->string('number_format');
          $table->string('date_format');
          $table->boolean('is_active')->default(true);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};

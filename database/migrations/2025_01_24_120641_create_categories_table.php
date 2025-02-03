<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration{
		/**
		 * Run the migrations.
		 */
		public function up():void{
			Schema::create('categories',function(Blueprint $table){
				$table->id();
				$table->foreignId('group_id')->constrained('category_groups')->onDelete('cascade');
				$table->string('category')->unique();
				$table->decimal('amount',10,2)->default(0.00);
				$table->string('message')->nullable();
				$table->string('day_month')->nullable();
				$table->string('target_date')->nullable();
				$table->decimal('assigned',10,2)->default(0.00);
				$table->decimal('activity',10,2)->default(0.00);
				$table->decimal('available',10,2)->default(0.00);
				$table->integer('ordering')->default(1000);
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 */
		public function down():void{
			Schema::dropIfExists('categories');
		}
	};

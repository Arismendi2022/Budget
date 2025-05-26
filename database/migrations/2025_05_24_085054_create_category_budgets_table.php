<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration{
		/**
		 * Run the migrations.
		 */
		public function up():void{
			Schema::create('category_budgets',function(Blueprint $table){
				$table->id();
				$table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
				$table->decimal('amount',10,2)->default(0.00);
				$table->decimal('assign',10,2)->default(0.00);
				$table->string('message')->nullable();
				$table->string('status_details')->nullable();
				$table->string('option_type')->nullable();
				$table->string('frequency')->nullable();
				$table->string('target_date')->nullable();
				$table->decimal('assigned',10,2)->default(0.00);
				$table->decimal('activity',10,2)->default(0.00);
				$table->decimal('available',10,2)->default(0.00);
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 */
		public function down():void{
			Schema::dropIfExists('category_budgets');
		}
	};

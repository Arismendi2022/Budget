<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration{
		/**
		 * Run the migrations.
		 */
		public function up():void{
			Schema::create('category_targets',function(Blueprint $table){
				$table->id();
				$table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
				$table->decimal('amount',10,2)->default(0.00);
				$table->decimal('assign',10,2)->default(0.00);
				$table->string('message')->nullable();
				$table->string('status_details')->nullable();
				$table->string('day_of_week')->nullable();
				$table->string('day_of_month')->nullable();
				$table->date('target_date')->nullable();
				$table->boolean('is_repeat_enabled')->default(false);
				$table->integer('repeat_frequency')->nullable();
				$table->tinyInteger('repeat_unit')->nullable();
				$table->date('next_target_date')->nullable();
				$table->string('option_type')->nullable();
				$table->string('frequency')->nullable();
				$table->boolean('filter_by_date')->default(false);
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
			Schema::dropIfExists('category_targets');
		}
	};

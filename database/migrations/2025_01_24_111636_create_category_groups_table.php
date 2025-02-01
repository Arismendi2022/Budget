<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration{
		/**
		 * Run the migrations.
		 */
		public function up():void{
			Schema::create('category_groups',function(Blueprint $table){
				$table->id();
				$table->foreignId('budget_id')->constrained('budgets')->cascadeOnDelete();
				$table->string('name');
				$table->integer('ordering')->default(1000);
				$table->timestamps();
			});
		}
		
		/**
		 * Reverse the migrations.
		 */
		public function down():void{
			Schema::dropIfExists('category_groups');
		}
	};

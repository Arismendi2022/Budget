<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	return new class extends Migration{
		/**
		 * Run the migrations.
		 */
		public function up():void{
			Schema::table('budget_accounts',function(Blueprint $table){
				$table->foreignId('category_id')->nullable()->after('budget_id')->constrained('categories')->cascadeOnDelete();
			});
		}
		
		/**
		 * Reverse the migrations.
		 */
		public function down():void{
			Schema::table('budget_accounts',function(Blueprint $table){
				$table->dropForeign(['category_id']);
				$table->dropColumn('category_id');
			});
		}
	};

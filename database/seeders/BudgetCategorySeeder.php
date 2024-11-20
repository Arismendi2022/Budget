<?php

  namespace Database\Seeders;

  use App\Models\BudgetCategory;
  use App\Models\Category;
  use Illuminate\Database\Seeder;

  class BudgetCategorySeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      BudgetCategory::insert([
        ['group_id' => 1,'name' => '🏠 Rent/Mortgage','created_at' => now(),'updated_at' => now()],
        ['group_id' => 1,'name' => '📱 Phone','created_at' => now(),'updated_at' => now()],
        ['group_id' => 1,'name' => '💻 Internet','created_at' => now(),'updated_at' => now()],
        ['group_id' => 1,'name' => '⚡️ Utilities','created_at' => now(),'updated_at' => now()],
        ['group_id' => 2,'name' => '🛒 Groceries','created_at' => now(),'updated_at' => now()],
        ['group_id' => 2,'name' => '🚘 Transportation','created_at' => now(),'updated_at' => now()],
        ['group_id' => 2,'name' => '🩺 Medical expenses','created_at' => now(),'updated_at' => now()],
        ['group_id' => 2,'name' => '😌 Emergency Fund','created_at' => now(),'updated_at' => now()],
        ['group_id' => 3,'name' => '🍽️ Dining out','created_at' => now(),'updated_at' => now()],
        ['group_id' => 3,'name' => '🍿 Entertainment','created_at' => now(),'updated_at' => now()],
        ['group_id' => 3,'name' => '🏝️ Vacation','created_at' => now(),'updated_at' => now()],
        ['group_id' => 3,'name' => '️ Stuff I forgot to budget for','created_at' => now(),'updated_at' => now()],
        ['group_id' => 3,'name' => '🌳 YNAB subscription','created_at' => now(),'updated_at' => now()],
      ]);
    }
  }

<?php

  namespace Database\Seeders;

  use App\Models\Category;
  use Illuminate\Database\Seeder;

  class CategorySeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      Category::insert([
        ['group_id' => 1,'name' => '🏠 Rent/Mortgage'],
        ['group_id' => 1,'name' => '📱 Phone'],
        ['group_id' => 1,'name' => '💻 Internet'],
        ['group_id' => 1,'name' => '⚡️ Utilities'],
        ['group_id' => 2,'name' => '🛒 Groceries'],
        ['group_id' => 2,'name' => '🚘 Transportation'],
        ['group_id' => 2,'name' => '🩺 Medical expenses'],
        ['group_id' => 2,'name' => '😌 Emergency Fund'],
        ['group_id' => 3,'name' => '🍽️ Dining out'],
        ['group_id' => 3,'name' => '🍿 Entertainment'],
        ['group_id' => 3,'name' => '🏝️ Vacation'],
        ['group_id' => 3,'name' => '️ Stuff I forgot to budget for'],
        ['group_id' => 3,'name' => '🌳 YNAB subscription'],
      ]);
    }
  }

<?php

  namespace Database\Seeders;

  use App\Models\BudgetGroup;
  use App\Models\CategoryGroup;
  use Illuminate\Database\Seeder;

  class BudgetGroupSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      // Usamos insert para agregar múltiples registros
      BudgetGroup::insert([
        ['name' => 'Bills','created_at' => now(),'updated_at' => now()],
        ['name' => 'Needs','created_at' => now(),'updated_at' => now()],
        ['name' => 'Wants','created_at' => now(),'updated_at' => now()],
      ]);
    }
  }

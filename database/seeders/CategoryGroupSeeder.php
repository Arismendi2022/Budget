<?php

  namespace Database\Seeders;

  use App\Models\CategoryGroup;
  use Illuminate\Database\Seeder;

  class CategoryGroupSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      // Usamos insert para agregar múltiples registros
      CategoryGroup::insert([
        ['name' => 'Bills'],
        ['name' => 'Needs'],
        ['name' => 'Wants'],
      ]);
    }
  }

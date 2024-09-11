<?php

  namespace Database\Seeders;

  use App\Models\User;
  use App\UserStatus;
  use App\UserType;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Facades\Auth ;

  class UserSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      User::create([
        'email'    => 'admin@email.com',
        'password' => Hash::make('12345'),
        'type'     => UserType::SuperAdmin,
        'status'   => UserStatus::Active,
      ]);
    }
  }

<?php

  namespace Database\Seeders;

  use App\Models\User;
  use App\UserStatus;
  use App\UserType;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\Hash;

  class AdminUser extends Seeder
  {
    /**
     * Run the database seeds.
     */
    public function run():void{
      User::create([
        'email'             => 'admin@email.com',
        'email_verified_at' => now(),
        'password'          => Hash::make('123456'),
        'type'              => UserType::SuperAdmin,
        'status'            => UserStatus::Active,
      ]);
    }
  }

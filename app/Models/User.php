<?php

  namespace App\Models;

  // use Illuminate\Contracts\Auth\MustVerifyEmail;
  use App\UserStatus;
  use App\UserType;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Relations\HasMany;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;


  class User extends Authenticatable
  {
    use HasFactory,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
      'email',
      'password',
      'type',
      'verified',
      'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'password',
      'remember_token',
    ];

    public static function create(array $array){
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts():array{
      return [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'status'            => UserStatus::class,
        'type'              => UserType::class,
      ];
    }

    /**
     * Relación con Budget
     */
    public function budgets():HasMany {
      return $this->hasMany(Budget::class);
    }


  }

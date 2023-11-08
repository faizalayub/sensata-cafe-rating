<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function registerEmployee($employeeID)
    {
        $existingUser = User::where('employee_id', $employeeID)->first();

        if(!$existingUser){
            return User::create([
                'name' => NULL,
                'email' => NULL,
                'password' => bcrypt($employeeID),
                'employee_id' => $employeeID
            ]);
        }

        return User::where('employee_id', $employeeID)->first();
    }
}

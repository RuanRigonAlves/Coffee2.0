<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'has_address',
        'is_admin',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $cart = new Cart();

            $cart->user_id = $user->id;

            $cart->save();
        });
    }

    public static function loginUser($request)
    {
        $request->session()->regenerate();
    }

    public static function logoutUser($request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }


    public static function saveUserAddress($user)
    {
        $user->has_address = true;
        $user->save();
    }

    public static function updateUserAddress($user, $validatedData)
    {
        $user->userInfo->update($validatedData);
    }

    public static function updateUserPermission($user, $bool)
    {
        $user->is_admin = $bool;
        $user->save();
    }
}

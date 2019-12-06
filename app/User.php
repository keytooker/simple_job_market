<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function isCustomer($id)
    {
        $user = User::find($id);
        if ($user->role_id == 1)
            return true;
        else
            return false;
    }

    public static function isContractor($id)
    {
        $user = User::find($id);
        if ($user->role_id == 2)
            return true;
        else
            return false;
    }

    /**
     * Получить отклики на вакансии.
     */
    public function responds()
    {
        return $this->hasMany('App\Respond', 'contractor_id');
    }
}

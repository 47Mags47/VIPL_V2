<?php

namespace App\Models\Main;

use App\Models\Glossary\Division;
use App\Models\Glossary\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    ### Трейты
    ##################################################
    use Notifiable, HasApiTokens;

    ### Настройки
    ##################################################
    protected
        $table = 'main__users',
        $guarded = [],
        $hidden = [
            'password',
            'remember_token',
        ];

    ### Функции
    ##################################################
    public function isAdmin()
    {
        return $this->role_code === 'admin';
    }
    public function isAdministration()
    {
        return $this->role_code === 'admin' or $this->role_code === 'moder';
    }
    public function isUser()
    {
        return $this->role_code === 'user';
    }

    ### Связи
    ##################################################
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_code', 'code');
    }

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_code', 'code');
    }
}

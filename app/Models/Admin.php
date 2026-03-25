<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_admin';

    protected $guard = 'admin';

    protected $fillable = [
        'employee_ad_id',
        'password',
        'is_active',
        'user_type',
        'theme_color',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function isSuperAdmin(): bool
    {
        return $this->user_type === 'all' || $this->user_type === 'super_admin';
    }
}


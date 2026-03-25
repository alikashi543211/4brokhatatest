<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statement extends Model
{
    protected $fillable = [
        'title',
        'statement_date',
        'notes',
        'is_active',
        'created_by',
    ];

    protected $casts = ['statement_date' => 'date'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function kharcha(): HasMany
    {
        return $this->hasMany(Transaction::class)->where('type', 'kharcha')->where('is_active', 1);
    }

    public function amad(): HasMany
    {
        return $this->hasMany(Transaction::class)->where('type', 'amad')->where('is_active', 1);
    }

    public function getTotalKharchaAttribute(): float
    {
        if ($this->relationLoaded('kharcha')) {
            return (float) $this->kharcha->sum('amount');
        }

        return (float) $this->kharcha()->sum('amount');
    }

    public function getTotalAmadAttribute(): float
    {
        if ($this->relationLoaded('amad')) {
            return (float) $this->amad->sum('amount');
        }

        return (float) $this->amad()->sum('amount');
    }

    public function getBalanceAttribute(): float
    {
        return $this->total_amad - $this->total_kharcha;
    }
}


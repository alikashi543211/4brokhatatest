<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'statement_id',
        'type',
        'description',
        'amount',
        'sr_no',
        'color_tag',
        'notes',
        'transaction_date',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_date' => 'date',
    ];

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class);
    }
}


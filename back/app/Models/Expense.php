<?php

namespace App\Models;

use App\Enums\ExpenseCategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'category',
        'date',
        'description',
    ];

    protected $casts = [
        'category' => ExpenseCategoryEnum::class,
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

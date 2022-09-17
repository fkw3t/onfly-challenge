<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'ocorred_in',
        'user_id',
        'amount',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function booted()
    {    
        static::creating(fn(Expense $expense) => $expense->id = (string) Uuid::uuid4());
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

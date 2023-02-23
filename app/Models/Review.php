<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'advertisement_id',
        'rating',
        'description'
    ];

    protected $table = 'reviews';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function advertisement(): BelongsTo {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }

}

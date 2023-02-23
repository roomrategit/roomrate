<?php

namespace App\Models;

use App\Http\Traits\Imagable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory, Imagable;

    protected $fillable = [
        'title',
        'description',
        'gallery',
        'rating'
    ];

    protected $table = 'advertisements';
}

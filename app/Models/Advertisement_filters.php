<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement_filters extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'advertisement_id',
        'filter_values_id'
    ];
}

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

    public function filters_value(){
        
        return $this->belongsToMany(Filter_value::class, 'advertisement_filters', 'advertisement_id', 'filter_values_id');
    }
}

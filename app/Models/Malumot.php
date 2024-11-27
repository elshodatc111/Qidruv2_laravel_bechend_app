<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malumot extends Model
{
    protected $fillable = [
        'typeing_id',
        'region_id',
        'toifa_id',
        'title',
        'description',
        'image',
    ];
}
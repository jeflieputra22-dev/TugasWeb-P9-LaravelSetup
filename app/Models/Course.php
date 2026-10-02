<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Dibuat dengan: php artisan make:model Course -m
class Course extends Model
{
    protected $fillable = ['title', 'description'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;

    protected $table = 'home_abouts';
    protected $fillable = ['title', 'description', 'feature_1', 'feature_2', 'feature_3'];
}

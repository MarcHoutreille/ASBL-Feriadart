<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'img_src',
        'email',
        'url',
        'facebook',
        'instagram',
    ];
}

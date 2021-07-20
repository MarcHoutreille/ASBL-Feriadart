<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'fname',
        'lname',
        'bio',
        'products',
        'telephone',
        'email',
        'url',
        'img_src',
        'accepted',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

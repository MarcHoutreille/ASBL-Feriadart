<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;


    protected $fillable = [
        'event_id',
        'type',
        'img_src'

    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;


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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_start',
        'date_end',
        'name',
        'slug',
        'img_src',
        'description',
        'inscription_img',
        'inscription_txt',
        'place',
        'address',
        'telephone',
        'email',
        'url',
        'open',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('place', 'like', '%' . $search . '%')
                ->orWhere('date_start', 'like', '%' . $search . '%');
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function announcements():HasMany
    {
        return $this->hasMany(Announcement::class);
    }
}

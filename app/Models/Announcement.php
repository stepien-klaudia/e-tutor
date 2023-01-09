<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'place',
        'price',
        'category_id',
        'level_id',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(AnnouncementCategory::class);
    }

    public function level():BelongsTo
    {
        return $this->belongsTo(AnnouncementLevel::class);
    }
}

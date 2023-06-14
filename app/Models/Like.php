<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Like extends Model
{
    use HasFactory, SoftDeletes;
     protected $fillable = [
        'state',
        'likedBy',
        'music_ID',
    ];

    public function music(): BelongsTo
    {
        return $this->belongsTo(Upload::class, 'music_ID', 'id');
    }
}

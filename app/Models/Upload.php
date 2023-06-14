<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Upload extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'music',
        'date',
        'title',
        'Author',
        'catId',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'Author', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'catId', 'Cat_ID');
    }

    public function musics(): HasMany
    {
        return $this->hasMany(Upload::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'musicId', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'music_ID', 'id');
    }
}

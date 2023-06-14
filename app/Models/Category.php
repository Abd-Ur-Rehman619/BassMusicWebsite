<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'Cat_ID';
    protected $fillable = [
        'Cat_ID',
        'Cat_title',
        'Cat_Description',
        'Cat_image',
        'User_ID ',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'User_ID', 'id');
    }

    public function musics(): HasMany
    {
        return $this->hasMany(Upload::class);
    }


}

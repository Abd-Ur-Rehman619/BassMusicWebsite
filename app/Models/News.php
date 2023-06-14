<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class News extends Model
{
     use HasFactory, SoftDeletes;

    protected $primaryKey = 'News_ID';
    protected $fillable = [
        'News_Title',
        'News_Description',
        'News_Date',
        'news_image',
        'UID ',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UID', 'id');
    }

}

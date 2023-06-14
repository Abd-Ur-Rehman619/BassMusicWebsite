<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'comments',
        'Date',
        'U_Id',
        'musicId',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'U_Id', 'id');
    }

    public function music(): BelongsTo
    {
        return $this->belongsTo(Upload::class, 'musicId', 'id');
    }


}

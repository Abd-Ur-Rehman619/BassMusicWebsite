<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'Event_ID';
    protected $fillable = [
        'Event_Title',
        'Event_Description',
        'Event_Date',
        'event_image',
        'location',
        'userID',
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    /**
     * Get the user that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}

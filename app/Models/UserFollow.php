<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFollow extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_follows';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function followedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'followed_user_id', 'id');
    }
}

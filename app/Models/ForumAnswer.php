<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForumAnswer extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'forum_answers';

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function forum_question(): BelongsTo
    {
        return $this->belongsTo(ForumQuestion::class, 'forum_question_id', 'id');
    }
}

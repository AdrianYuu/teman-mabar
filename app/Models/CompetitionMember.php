<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompetitionMember extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'competition_members';

    protected $guarded = [];

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class, 'competition_id', 'id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(User::class, 'player_id', 'id');
    }
}

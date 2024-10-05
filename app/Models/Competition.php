<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'competitions';
    
    protected $guarded = [];

    public function competitionTeams(): HasMany
    {
        return $this->hasMany(CompetitionTeam::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_user_id', 'id');
    }
}

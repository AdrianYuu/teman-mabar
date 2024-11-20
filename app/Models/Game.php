<?php

namespace App\Models;

use App\Models\Order;
use App\Models\GameGenre;
use App\Models\UserPriceDetail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    
    protected $table = 'games';

    protected $guarded = [];

    public function gameGenre(): BelongsTo
    {
        return $this->belongsTo(GameGenre::class, 'genre_id', 'id');
    }

    public function userPriceDetails(): HasMany
    {
        return $this->hasMany(UserPriceDetail::class, 'game_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'game_id', 'id');
    }

    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class, 'competition_id', 'id');
    }
}

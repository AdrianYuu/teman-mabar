<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameGenre extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'game_genres';

    protected $guarded = [];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'genre_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($gameGenre) {
            $gameGenre->games()->delete();
        });
    }
}

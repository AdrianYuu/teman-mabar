<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'payments';

    protected $guarded = [];

    public function userActivities(): HasMany
    {
        return $this->hasMany(UserActivity::class);
    }
}

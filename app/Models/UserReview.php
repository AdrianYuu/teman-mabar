<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReview extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'user_reviews';

    protected $guarded = [];

    public function gamer()
    {
        return $this->belongsTo(User::class, 'gamer_user_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id');
    }
}

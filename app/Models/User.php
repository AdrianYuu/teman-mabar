<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, HasUuids, SoftDeletes, Authenticatable;

    protected $table = 'users';

    protected $guarded = [];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function userPriceDetails(): HasMany
    {
        return $this->hasMany(UserPriceDetail::class, 'user_id', 'id');
    }

    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class, 'organizer_user_id', 'id');
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'leader_user_id', 'id');
    }

    public function teamMembers(): HasMany
    {
        return $this->hasMany(TeamMember::class, 'player_user_id', 'id');
    }

    public function userActivities(): HasMany
    {
        return $this->hasMany(UserActivity::class, 'user_id', 'id');
    }

    public function userReviewsAsGamer(): HasMany
    {
        return $this->hasMany(UserReview::class, 'gamer_user_id', 'id');
    }

    public function userReviewsAsCustomer(): HasMany
    {
        return $this->hasMany(UserReview::class, 'customer_user_id', 'id');
    }

    public function ordersAsGamer(): HasMany
    {
        return $this->hasMany(Order::class, 'gamer_id', 'id');
    }

    public function ordersAsCustomer(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    public function userFollowsAsUser(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'user_id', 'id');
    }

    public function userFollowsAsFollowed(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'followed_user_id', 'id');
    }

    public function userSubscribesAsUser(): HasMany
    {
        return $this->hasMany(UserSubscribe::class, 'user_id', 'id');
    }

    public function userSubscribesAsSubscribed(): HasMany
    {
        return $this->hasMany(UserSubscribe::class, 'subscribed_user_id', 'id');
    }
}

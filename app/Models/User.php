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

    public function userPriceDetails(): HasMany
    {
        return $this->hasMany(UserPriceDetail::class);
    }

    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function teamMembers(): HasMany
    {
        return $this->hasMany(TeamMember::class);
    }

    public function userActivities(): HasMany
    {
        return $this->hasMany(UserActivity::class);
    }

    public function userReviewsAsGamer(): HasMany
    {
        return $this->hasMany(UserReview::class, 'gamer_user_id');
    }

    public function userReviewsAsCustomer(): HasMany
    {
        return $this->hasMany(UserReview::class, 'customer_user_id');
    }

    public function ordersAsGamer(): HasMany
    {
        return $this->hasMany(Order::class, 'gamer_id');
    }

    public function ordersAsCustomer(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function userFollowsAsUser(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'user_id');
    }

    public function userFollowsAsFollowed(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'followed_user_id');
    }

    public function userSubscribesAsUser(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'user_id');
    }

    public function userSubscribesAsSubscribed(): HasMany
    {
        return $this->hasMany(UserFollow::class, 'subscribed_user_id');
    }
}

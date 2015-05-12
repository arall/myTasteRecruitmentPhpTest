<?php

namespace MyTaste;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name'];

    /**
     * Cookbooks relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cookbooks()
    {
        return $this->hasMany('MyTaste\Cookbook');
    }

    /**
     * Followers relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany('MyTaste\User', 'user_followers', 'user_id', 'follower_id');
    }

    /**
     * Followers relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
        return $this->belongsToMany('MyTaste\User', 'user_followers', 'follower_id', 'user_id');
    }

    /**
     * Notifications relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('MyTaste\Notification', 'owner_id');
    }
}

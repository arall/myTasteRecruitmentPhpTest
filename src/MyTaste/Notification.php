<?php

namespace MyTaste;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['type'];

    /**
     * Owner relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('MyTaste\User', 'owner_id');
    }

    /**
     * User relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('MyTaste\User');
    }

    /**
     * Recipe relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo('MyTaste\Recipe');
    }

    /**
     * Cookbook relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cookbook()
    {
        return $this->belongsTo('MyTaste\Cookbook');
    }

    /**
     * Adds a notification to user stream.
     *
     * @param string   $type
     * @param User     $owner
     * @param User     $user
     * @param Recipe   $recipe
     * @param Cookbook $cookbook
     *
     * @return bool
     */
    public static function add($type, User $owner, User $user, Recipe $recipe, Cookbook $cookbook)
    {
        $notification = new Notification();
        $notification->type = $type;
        $notification->owner()->associate($owner);
        $notification->user()->associate($user);
        $notification->recipe()->associate($recipe);
        $notification->cookbook()->associate($cookbook);

        return $notification->save();
    }
}

<?php

namespace MyTaste;

use Illuminate\Database\Eloquent\Model;

class Cookbook extends Model
{
    protected $fillable = ['name'];

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
     * Recipes relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function recipes()
    {
        return $this->belongsToMany('MyTaste\Recipe', 'cookbooks_recipes');
    }

    /**
     * Adds a recipe
     * Notify followers.
     *
     * @return bool
     */
    public function addRecipe(Recipe $recipe)
    {
        // Attach a recipe
        $this->recipes()->attach($recipe->id);
        $res = $this->save();

        if ($res) {
            // Notify followers
            if ($followers = $this->user->followers) {
                foreach ($followers as $follower) {
                    Notification::add('recipe-saved', $follower, $this->user, $recipe, $this);
                }
            }
        }

        return $res;
    }
}

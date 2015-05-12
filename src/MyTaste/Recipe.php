<?php

namespace MyTaste;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title'];

    /**
     * Cookbooks relation.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cookbooks()
    {
        return $this->belongsToMany('MyTaste\Cookbook', 'cookbooks_recipes');
    }
}

<?php

namespace Tests\MyTaste;

use MyTaste\Cookbook;
use MyTaste\Recipe;
use MyTaste\User;
use MyTaste\Notification;

class NotificationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function addRecipeSavedNotification()
    {
        $owner = User::find(2);
        $user = User::find(1);
        $cookbook = Cookbook::first();
        $recipe = Recipe::first();

        Notification::add('recipe-saved', $owner, $user, $recipe, $cookbook);

        $this->assertEquals(1, $owner->notifications()->count());
        $this->assertEquals('recipe-saved', $owner->notifications()->first()->type);
    }
}

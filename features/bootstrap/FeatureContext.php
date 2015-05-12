<?php

namespace MyTaste\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use PHPUnit_Framework_Assert as Asserts;
use Illuminate\Database\Capsule\Manager as DB;
use Exception;
use MyTaste\User;
use MyTaste\Cookbook;
use MyTaste\Recipe;
use MyTaste\Notification;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        // Reset database
        DB::unprepared(file_get_contents('database.sql'));
    }

    /**
     * @Given exists a user named :userName
     */
    public function existsAUserNamed($userName)
    {
        // Create User
        $user = User::create(['name' => $userName]);
        Asserts::assertEquals($userName, $user->name);
    }

    /**
     * @Given exists a user named :arg1 who owns a cookbook named :arg2
     */
    public function existsAUserNamedWhoOwnsACookbookNamed($arg1, $arg2)
    {
        // Create User
        $user = User::create(['name' => $arg1]);
        Asserts::assertEquals($arg1, $user->name);

        // Create Cookbook
        $cookbook = new Cookbook(['name' => $arg2]);
        $cookbook->user()->associate($user);
        $cookbook->save();
        Asserts::assertEquals($arg2, $cookbook->name);
        Asserts::assertEquals($arg1, $cookbook->user->name);
    }

    /**
     * @Given :arg1 is following :arg2
     */
    public function isFollowing($arg1, $arg2)
    {
        // Follower
        $follower = $this->getUserByName($arg1);

        // User
        $user = $this->getUserByName($arg2);

        // Follow
        $user->followers()->attach($follower->id);
        Asserts::assertCount(1, $user->followers);
    }

    /**
     * @Given exists a recipe with title :arg1
     */
    public function existsARecipeWithTitle($arg1)
    {
        // Create recipe
        $recipe = Recipe::create(['title' => $arg1]);
        Asserts::assertEquals($arg1, $recipe->title);
    }

    /**
     * @When :arg1 saves a recipe into his :arg2 cookbook
     */
    public function savesARecipeIntoHisCookbook($arg1, $arg2)
    {
        // User
        $user = $this->getUserByName($arg1);

        // Get a recipe
        $recipe = Recipe::first();
        Asserts::assertInstanceOf('MyTaste\Recipe', $recipe);

        // Cookbook
        $cookbook = $this->getCookbookByName($user, $arg2);

        // Add recipe
        $cookbook->addRecipe($recipe);
    }

    /**
     * @Then the :arg1's news stream should contain a :arg2 notification
     */
    public function theSNewsStreamShouldContainANotification($arg1, $arg2)
    {
        // User
        $user = $this->getUserByName($arg1);

        // Notification
        $notification = $user->notifications()->where('type', $arg2)->first();
        Asserts::assertEquals($arg2, $notification->type);
    }

    /**
     * @Then the notification should contain information from the user :arg1, the recipe :arg2, the cookbook :arg3 and when it occurred on.
     */
    public function theNotificationShouldContainInformationFromTheUserTheRecipeTheCookbookAndWhenItOccurredOn($arg1, $arg2, $arg3)
    {
        // Notification
        $notification = Notification::first();

        // User
        Asserts::assertEquals($arg1, $notification->user->name);

        // Recipe
        Asserts::assertEquals($arg2, $notification->recipe->title);

        // Cookbook
        Asserts::assertEquals($arg3, $notification->cookbook->name);
    }

    /**
     * @Given exists a recipe of title :arg1
     */
    public function existsARecipeOfTitle($arg1)
    {
        // Create recipe
        $recipe = Recipe::create(['title' => $arg1]);
        Asserts::assertEquals($arg1, $recipe->title);
    }

    /**
     * @When the recipe :arg1 is added to the John's cookbook named :arg2
     */
    public function theRecipeIsAddedToTheJohnSCookbookNamed($arg1, $arg2)
    {
        // Recipe
        $recipe = $this->getRecipeByTitle($arg1);

        // User
        $user = $this->getUserByName('John');

        // Cookbook
        $cookbook = $this->getCookbookByName($user, $arg2);

        // Add recipe
        $cookbook->addRecipe($recipe);
    }

    /**
     * @Then the John's cookbook named :arg1 should contain the recipe of title :arg2
     */
    public function theJohnSCookbookNamedShouldContainTheRecipeOfTitle($arg1, $arg2)
    {
        // User
        $user = $this->getUserByName('John');

        // Cookbook
        $cookbook = $this->getCookbookByName($user, $arg1);

        // Recipe
        $recipe = $cookbook->recipes()->where('title', $arg2)->first();
        Asserts::assertEquals($arg2, $recipe->title);
    }

    /**
     * Get a user by its name.
     *
     * @param string $name
     *
     * @return MyTaste\User
     */
    private function getUserByName($name)
    {
        if ($user = User::where('name', $name)->first()) {
            Asserts::assertEquals($name, $user->name);

            return $user;
        }

        throw new Exception('Recipe not found');
    }

    /**
     * Get a recipe by its title.
     *
     * @param string $title
     *
     * @return MyTaste\Recipe
     */
    private function getRecipeByTitle($title)
    {
        if ($recipe = Recipe::where('title', $title)->first()) {
            Asserts::assertEquals($title, $recipe->title);

            return $recipe;
        }

        throw new Exception('Recipe not found');
    }

    /**
     * Get a cookbook by its name.
     *
     * @param MyTaste\User $user
     * @param string       $name
     *
     * @return MyTaste\Recipe
     */
    private function getCookbookByName(User $user, $name)
    {
        if ($cookbook = $user->cookbooks()->where('name', $name)->first()) {
            Asserts::assertEquals($name, $cookbook->name);

            return $cookbook;
        }

        throw new Exception('Cookbook not found');
    }
}

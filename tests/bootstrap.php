<?php

// Composer
require_once __DIR__.'/../vendor/autoload.php';

// Definitions
use Illuminate\Database\Capsule\Manager as DB;
use MyTaste\User;
use MyTaste\Cookbook;
use MyTaste\Recipe;

// Reset database
DB::unprepared(file_get_contents(__DIR__.'/../database.sql'));

/* ------------------
 * Create data
 * ------------------
 */
// Users
$user1 = User::create(['name' => 'John']);
$user2 = User::create(['name' => 'Doe']);

// Recipe
$recipe = Recipe::create(['title' => 'Crema catalana']);

// Create Cookbook
$cookbook = new Cookbook();
$cookbook->user()->associate($user1);
$cookbook->name = 'Desserts';
$cookbook->save();

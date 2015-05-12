<?php

namespace Tests\MyTaste;

use MyTaste\Cookbook;
use MyTaste\Recipe;

class CookbookTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function addRecipe()
    {
        $cookbook = Cookbook::first();

        $recipe = Recipe::first();

        $cookbook->addRecipe($recipe);

        $this->assertEquals(1, $cookbook->recipes()->count());
        $this->assertEquals($recipe->title, $cookbook->recipes()->first()->title);
    }
}

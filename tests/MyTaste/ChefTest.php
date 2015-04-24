<?php

namespace Tests\MyTaste;

use MyTaste\Chef;

class ChefTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function sayHello()
    {
        $chef = new Chef();

        $actual = $chef->greet();

        $this->assertEquals('Hello!', $actual);
    }
}

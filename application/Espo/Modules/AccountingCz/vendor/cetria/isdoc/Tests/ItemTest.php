<?php

namespace Isdoc\Tests;

use Isdoc\Item;
use PHPUnit\Framework\TestCase;
use Cetria\Helpers\Reflection\Reflection;

class ItemTest extends TestCase
{
    /**
     * @test
     */
    public function testSetDescription(): void
    {
        $item = new Item();
        $item->setDescription('test');
        $property = Reflection::getHiddenProperty($item,'description');
        $this->assertEquals('test',$property);
    }
}
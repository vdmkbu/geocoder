<?php

namespace Vdmkbu\Geocoder\Tests\Types;

use PHPUnit\Framework\TestCase;
use Vdmkbu\Geocoder\Types\Point;

class PointTest extends TestCase
{
    /** @test */
    public function testPoint()
    {
        $point = new Point($value = '37.611347,55.760241');
        self::assertEquals($value, $point->getValue());
    }

    /** @test */
    public function testEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Point('');
    }

}
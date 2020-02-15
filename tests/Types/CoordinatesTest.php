<?php

namespace Vdmkbu\Geocoder\Tests\Types;

use PHPUnit\Framework\TestCase;
use Vdmkbu\Geocoder\Types\Coordinates;

class CoordinatesTest extends TestCase
{
    /** @test */
    public function testCoordinates()
    {
        $coordinates = new Coordinates($lat = '30.111',$lng = '45.111');

        self::assertEquals($lat, $coordinates->getLat());
        self::assertEquals($lng, $coordinates->getLng());
    }

    /** @test */
    public function testEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Coordinates('111','');
    }
}
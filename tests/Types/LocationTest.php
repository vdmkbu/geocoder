<?php

namespace Vdmkbu\Geocoder\Tests\Types;

use PHPUnit\Framework\TestCase;
use Vdmkbu\Geocoder\Types\Location;

class LocationTest extends TestCase
{
    /** @test */
    public function testLocation()
    {
        $address = new \StdClass();
        $address->country = 'Country';
        $address->street = 'Street';
        $address->house = 'House';


        $location = new Location($address);

        self::assertEquals($address->country, $location->getCountry());
        self::assertEquals($address->street, $location->getStreet());
        self::assertEquals($address->house, $location->getHouse());
    }

}
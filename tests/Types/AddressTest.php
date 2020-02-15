<?php

namespace Vdmkbu\Geocoder\Tests\Types;

use PHPUnit\Framework\TestCase;
use Vdmkbu\Geocoder\Types\Address;

class AddressTest extends TestCase
{
    /** @test */
    public function testAddress()
    {
        $address = new Address($value = 'Some address');

        self::assertEquals($value, $address->getValue());
    }

    /** @test */
    public function testEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Address('');
    }
}
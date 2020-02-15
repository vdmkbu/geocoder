<?php

namespace Vdmkbu\Geolocator\Tests;

use PHPUnit\Framework\TestCase;
use Vdmkbu\Geolocator\Types\Address;
use Vdmkbu\Geolocator\Types\Point;
use Vdmkbu\Geolocator\YandexGeocoder;
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

class GecoderTest extends TestCase
{
    /** @test */
    public function testGeocoder()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $config = [];
        $guzzle = new GuzzleClient($config);
        $client = new GuzzleAdapter($guzzle);

        $api_key = getenv('YANDEX_API_KEY');

        $geocoder = new YandexGeocoder($client, $api_key);
        $address = $geocoder->geocode(new Point('37.611347,55.760241'));
        $point = $point = $geocoder->geocode(new Address('Челябинск проспект Ленина 54'));

        self::assertNotNull($address);
        self::assertNotNull($point);


        self::assertEquals("Россия", $address->getCountry());
        self::assertEquals("6с1", $address->getHouse());
        self::assertEquals("Тверская улица", $address->getStreet());
        // and other

        self::assertEquals("55.160818", $point->getLng());
        self::assertEquals("61.402419", $point->getLat());
    }
}
<?php

namespace Vdmkbu\Geolocator\Types;


use Vdmkbu\Geolocator\Interfaces\GeoObject;

class Address implements GeoObject
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getValue()
    {
        return $this->address;
    }

    public function getData($response)
    {
        list($lng, $lat) = explode(' ',$response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);

        return new Coordinates($lng, $lat);
    }
}
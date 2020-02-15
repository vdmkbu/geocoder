<?php

namespace Vdmkbu\Geocoder\Types;


use Vdmkbu\Geocoder\Interfaces\GeoObject;

class Address implements GeoObject
{
    protected $address;

    public function __construct($address)
    {
        if (empty($address)) {
            throw new \InvalidArgumentException('Empty address');
        }

        $this->address = $address;
    }

    public function getValue()
    {
        return $this->address;
    }

    public function getData(\StdClass $response)
    {
        list($lng, $lat) = explode(' ',$response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);

        return new Coordinates($lng, $lat);
    }
}
<?php

namespace Vdmkbu\Geolocator\Types;


class Location
{
    protected $location;

    public function __construct(\StdClass $location)
    {
        $this->location = $location;
    }

    public function getCountry()
    {
        return $this->location->country;
    }

    public function getStreet()
    {
        return $this->location->street;
    }

    public function getHouse()
    {
        return $this->location->house;
    }

    // other getters
}
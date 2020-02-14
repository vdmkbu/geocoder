<?php

namespace Vdmkbu\Geolocator\Types;


class Coordinates
{
    protected $lat;
    protected $lng;

    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }
}
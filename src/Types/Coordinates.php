<?php

namespace Vdmkbu\Geocoder\Types;


class Coordinates
{
    protected $lat;
    protected $lng;

    public function __construct($lat, $lng)
    {
        if (empty($lat) || empty($lng)) {
            throw new \InvalidArgumentException('Empty coordinates');
        }

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
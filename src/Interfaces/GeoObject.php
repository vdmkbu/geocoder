<?php

namespace Vdmkbu\Geolocator\Interfaces;


interface GeoObject
{
    public function getValue();
    public function getData(\StdClass $response);
}
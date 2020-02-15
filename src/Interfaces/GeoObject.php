<?php

namespace Vdmkbu\Geocoder\Interfaces;


interface GeoObject
{
    public function getValue();
    public function getData(\StdClass $response);
}
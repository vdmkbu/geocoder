<?php

namespace Vdmkbu\Geolocator\Types;


use Vdmkbu\Geolocator\Interfaces\GeoObject;

class Point implements GeoObject
{
    protected $point;

    public function __construct($point)
    {
        if (empty($point)) {
            throw new \InvalidArgumentException('Empty point');
        }

        $this->point = $point;
    }

    public function getValue()
    {
        return $this->point;
    }

    public function getData($response)
    {
        $components = $response->response->GeoObjectCollection->featureMember[0]->GeoObject->metaDataProperty->GeocoderMetaData->Address->Components;

        $address = new \StdClass();

        foreach ($components as $component) {
            $address->{$component->kind} = $component->name;
        }

        return new Location($address);
    }


}
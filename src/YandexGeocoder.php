<?php

namespace Vdmkbu\Geolocator;


use Vdmkbu\Geolocator\Interfaces\GeoObject;

class YandexGeocoder
{
    protected $client;
    protected $api_key;

    public function __construct($client, $api_key)
    {
        $this->client = $client;
        $this->api_key = $api_key;
    }

    public function geocode(GeoObject $geo)
    {
        $params = array(
            'geocode' => $geo->getValue(), // адрес
            'format' => 'json', // формат ответа
            'results' => 1, // количество выводимых результатов
            'apikey' => $this->api_key, // ОБЯЗАТЕЛЬНО
        );

        $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));

        return $geo->getData($response);

    }
}
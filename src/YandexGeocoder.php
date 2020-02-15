<?php

namespace Vdmkbu\Geolocator;


use Psr\Http\Client\ClientExceptionInterface;
use Vdmkbu\Geolocator\Interfaces\GeoObject;
use Psr\Http\Client\ClientInterface;
use Laminas\Diactoros\RequestFactory;

class YandexGeocoder
{
    protected $client;
    protected $api_key;

    public function __construct(ClientInterface $client, $api_key)
    {
        $this->client = $client;
        $this->api_key = $api_key;
    }

    public function geocode(GeoObject $geo)
    {
        $uri = 'http://geocode-maps.yandex.ru/1.x/?' . http_build_query([
                'geocode' => $geo->getValue(),
                'format' => 'json',
                'results' => 1,
                'apikey' => $this->api_key,
            ]);


        $request = (new RequestFactory())->createRequest('GET', $uri);

        try {

            $response = $this->client->sendRequest($request);
            $response = json_decode($response->getBody());

        } catch (ClientExceptionInterface $exception) {

            return null;
        }

        if (empty($response))
            return null;

        return $geo->getData($response);

    }
}
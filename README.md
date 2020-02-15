##### Получаем координаты по переданному адресу или адрес по переданным координатам
[https://tech.yandex.ru/maps/geocoder/doc/desc/concepts/about-docpage/](https://tech.yandex.ru/maps/geocoder/doc/desc/concepts/about-docpage/)
```php
require 'vendor/autoload.php';

 // используем библиотеку GuzzleHttp и PSR-совместимый адаптер 
 use GuzzleHttp\Client as GuzzleClient;
 use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
 use Vdmkbu\Geocoder\Types\Address;
 use Vdmkbu\Geocoder\Types\Point;
 use Vdmkbu\Geocoder\YandexGeocoder;

 // готовим http-клиент
  $config = [];
  $guzzle = new GuzzleClient($config);
  $client = new GuzzleAdapter($guzzle);
  
  $api_key = 'YANDEX_API_KEY';
  $geocoder = new YandexGeocoder($client, $api_key);
  
  $address = $geocoder->geocode(new Point('37.611347,55.760241'));
  $address->getCountry();
  $address->getStreet();
  $address->getHouse();
  
  
  $point = $geocoder->geocode(new Address('Челябинск проспект Ленина 54'));
  $point->getLng();
  $point->getLat();
  
```
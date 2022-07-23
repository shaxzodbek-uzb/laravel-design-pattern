<?php

namespace DesignPattern\Adapter;

class Adapter
{
    public static function run()
    {
        $controller = app(AddressController::class);
        return $controller->getGeoCode();
    }
}
interface GeocoderAdapter
{
    public function geocode($address);
}
class YandexGeocoderAdapter implements GeocoderAdapter
{
    private YandexGeocoder $geocoder;
    public function __construct() {
        $this->geocoder = new YandexGeocoder;
    }
    function geocode($address)
    {
        return $this->geocoder->GetGeocode($address);
    }
}

class GoogleGeocoderAdapter implements GeocoderAdapter
{
    private GoogleGeocoder $geocoder;
    public function __construct() {
        $this->geocoder = new GoogleGeocoder;
    }
    function geocode($address)
    {
        return $this->geocoder->geocode($address);
    }
}
class UzavtoGeocoderAdapter implements GeocoderAdapter
{
    private UzavtoGeocoder $geocoder;
    public function __construct() {
        $this->geocoder = new UzavtoGeocoder;
    }
    function geocode($address)
    {
        return $this->geocoder->kordinataniOl($address);
    }
}
class YandexGeocoder
{
    public function GetGeocode($address)
    {
        return 'Yandex geocoding address: ' . $address;
    }
}
class UzavtoGeocoder {
    public function kordinataniOl($manzil){
        return 'Uzavto kordinatasini aniqlash: ' . $manzil;
    }
}
class GoogleGeocoder {
    public function geocode($address)
    {
        return 'Google geocoding address: ' . $address;
    }
}
class AddressController {
    public function getGeoCode()
    {
        return app(GeocoderAdapter::class)->geocode('Biror manzil');
    }
}
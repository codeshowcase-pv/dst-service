<?php
namespace src\controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use src\data;

class Controller
{
    /**
     * @throws GuzzleException
     */
    static function get_local_time(): string
    {
        if (!($_GET['city_id']))
            return json_encode(['error' => 'нет параметра']);

        $city = @data\cities()[$_GET['city_id']];

        if (!$city)
            return json_encode(['error' => 'у нас пока нет такого города']);

        $result = self::getResult($city);


        return json_encode(['local_time' => $result->timestamp]);
    }

    /**
     * @throws GuzzleException
     */
    static function get_utc_time(): string
    {
        if (!($_GET['city_id']))
            return json_encode(['error' => 'нет параметра']);

        $city = @data\cities()[$_GET['city_id']];

        if (!$city)
            return json_encode(['error' => 'у нас пока нет такого города']);

        $city = @data\cities()[$_GET['city_id']];
        $result = self::getResult($city);

        $utc_time = $result->timestamp - $result->gmtOffset;

        return json_encode(['utc_time' => $utc_time]);
    }


    /* Эта часть в настоящих приложениях выносится в сервис */
    /**
     * @param array $city
     * @return mixed
     * @throws GuzzleException
     */
    private static function getResult(array $city): mixed
    {
        $latitude = $city[2];
        $longitude = $city[3];

        $client = new Client([
            'base_uri' => 'http://api.timezonedb.com/v2.1',
            'timeout' => 10.0,
        ]);

        return json_decode($client->get('get-time-zone?key=' . $_ENV['API_KEY'] . '&format=json&by=position&lat=' . $latitude . '&lng=' . $longitude)
            ->getBody()
            ->getContents());
    }

}
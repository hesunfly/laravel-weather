<?php

namespace Hesunfly\LaravelWeather;

use Hesunfly\LaravelWeather\Exceptions\InvalidArgumentException;

class Weather
{
    use Request;

    protected $key = null;

    public function __construct()
    {
        $this->key = config('weather.key');
    }

    public function getWeather($city, $extensions = "base", $output = "json")
    {
        $url = "https://restapi.amap.com/v3/weather/weatherInfo";

        if (!in_array(strtolower($extensions), ['base', 'all'])) {
            throw new InvalidArgumentException('不合法的请求参数: ' . $extensions);
        }

        if (!in_array(strtolower($output), ['json', 'xml'])) {
            throw new InvalidArgumentException('不合法的请求参数: ' . $output);
        }

        $params = [
            'key' => $this->key,
            'city' => $city,
            'extensions' => strtolower($extensions),
            'output' => strtolower($output)
        ];

        $response = $this->get($url, $params);

        return $output === 'json' ? json_decode($response, true) : $response;
    }
}


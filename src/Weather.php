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

    public function currenct($city, $output = "json")
    {
        return $this->weather($city, 'base', $output);
    }


    public function forecast($city, $output = "json")
    {
        return $this->weather($city, 'all', $output);
    }

    private function weather($city, $type, $output)
    {
        if (!in_array(strtolower($output), ['json', 'xml'])) {
            throw new InvalidArgumentException('不合法的请求参数: ' . $output);
        }

        $params = [
            'key' => $this->key,
            'city' => $city,
            'extensions' => $type,
            'output' => strtolower($output)
        ];

        $response = $this->get($this->url, $params);

        return $output === 'json' ? json_decode($response, true) : $response;
    }
}


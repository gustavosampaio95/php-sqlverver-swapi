<?php

namespace SWApi\Services;

final class SWApi {
    protected static string $uri = 'https://www.swapi.tech/api';

    public static function call(string $path, array $params = []): \stdClass
    {
        $link = sizeof($params) > 0 ? self::$uri . $path . '?' . http_build_query($params) : self::$uri . $path;

        dump($link);

        $data = file_get_contents($link);

        return json_decode($data);
    }
}
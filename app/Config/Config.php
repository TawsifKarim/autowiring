<?php

namespace App\Config;


class Config
{

    protected $config = [
        'app' => [
            'name' => 'automatic wiring'
        ],
        'db' => [
            'host' => 'localhost',
            'database' => 'abcd',
            'username' => 'root',
            'password' => '1234'
        ]
    ];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        dump('config class initialized');
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        $keys = explode('.', $key);

        return isset($this->config[$keys[0]][$keys[1]]) ? $this->config[$keys[0]][$keys[1]] : null;
    }
}
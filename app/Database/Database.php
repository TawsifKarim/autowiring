<?php

namespace App\Database;

use App\Config\Config;

class Database
{
    /**
     * @var Config
     */
    private $config;

    /**
     * Database constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        dump('database class initialized');
    }

    /**
     * @return mixed|null
     */
    public function connect()
    {
        return $this->config->get('db.host');
    }
}
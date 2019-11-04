<?php


namespace App\Controllers;


use App\Config\Config;
use App\Database\Database;

class HomeController
{
    /**
     * @var Config
     */
    protected $config;
    /**
     * @var Database
     */
    protected $database;

    /**
     * HomeController constructor.
     * @param Config $config
     * @param Database $database
     */
    public function __construct(Config $config, Database $database)
    {
        $this->config = $config;
        $this->database = $database;

        dump('homecontroller init');
    }

    /**
     * @return array
     */
    public function index()
    {
        return [
            $this->config->get('app.name')
        ];
    }
}
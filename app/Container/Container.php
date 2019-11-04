<?php

namespace App\Container;

use App\Exceptions\NotFoundException;

class Container
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param $name
     * @return mixed
     * @throws NotFoundException
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param $name
     * @param callable $closure
     */
    public function set($name, callable $closure)
    {
        $this->items[$name] = $closure();
    }

    /**
     * @param $name
     * @return mixed
     * @throws NotFoundException
     */
    public function get($name)
    {
        if($this->has($name)){
            return $this->items[$name];
        }

        throw new NotFoundException();
    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->items[$name]);
    }
}
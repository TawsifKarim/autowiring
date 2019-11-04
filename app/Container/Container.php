<?php

namespace App\Container;

class Container
{
    protected $items = [];

    public function set($name, callable $closure)
    {
        $this->items[$name] = $closure;
    }

    public function get($name)
    {
        if($this->has($name)){
            return $this->items[$name];
        }

    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->items[$name]) ? true : false;
    }
}
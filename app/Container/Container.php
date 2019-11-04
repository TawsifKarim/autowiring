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
        $this->items[$name] = $closure;
    }

    /**
     * @param $name
     * @param callable $closure
     */
    public function share($name, callable $closure)
    {
        $this->items[$name] = function() use ($closure) {
            static $resolved;

            if(!$resolved){
                $resolved = $closure($this);
            }

            return $resolved;
        };
    }

    /**
     * @param $name
     * @return mixed
     * @throws NotFoundException
     */
    public function get($name)
    {
        if($this->has($name)){
            return $this->items[$name]($this);
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
<?php

namespace Framework\DependencyInjection;

use Framework\EventManager\EventManager;

class Container {

    /**
     * The array that holds the container
     * 
     * @var array
     */
    protected $items = array();

    /**
     * Sets an item
     * 
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set($key, $value) {
        if ($value instanceof \Closure) {
            $this->items[$key] = $value();
        } else {
            $this->items[$key] = $value;
        }

        return $this;
    }

    /**
     * Gets an item.
     * 
     * @param string $key
     * @return mixed
     * @throws Exception\KeyNotFoundException
     */
    public function get($key) {
        if (!isset($this->items[$key])) {
            EventManager::msg('Value ' . $msg . 'can not been founded!', 'error', true);
            return false;
        }

        return $this->items[$key];
    }

    public function remove($key) {
        unset($this->items[$key]);
    }

    public function has($key) {
        if (isset($this->items[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function offsetExists($key) {
        return $this->has($key);
    }

    public function offsetGet($key) {
        return $this->get($key);
    }

    public function offsetSet($key, $value) {
        $this->set($key, $value);
    }

    public function offsetUnset($key) {
        $this->remove($key);
    }

    public function offsetFullArray() {
        return $this->items;
    }

}
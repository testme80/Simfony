<?php

namespace Framework\Store;

interface StorageInterface {
    public function set($key, $value);
    public function get($key);
    public function has($key);
    public function remove($key);
}
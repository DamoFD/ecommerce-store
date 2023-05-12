<?php
class Cache {

    // Cache directory
    private $cacheDir = 'cache/';

    // Save data to cache
    public function saveToCache($key, $data) {
        $filename = $this->cacheDir . md5($key) . '.txt';
        file_put_contents($filename, serialize($data));
    }

    // Get data from cache
    public function getFromCache($key, $ttl = 86400) {
        $filename = $this->cacheDir . md5($key) . '.txt';
        if (file_exists($filename) && (filemtime($filename) + $ttl > time())) {
            return unserialize(file_get_contents($filename));
        }
        return false;
    }
}
?>
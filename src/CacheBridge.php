<?php
/**
 * ThinkPHP微信缓存类
 *
 * @author hectorqin<hectorqin@163.com>
 * @copyright hectorqin
 */

namespace Hectorqin\ThinkWechat;

use Psr\SimpleCache\CacheInterface;

class CacheBridge implements CacheInterface
{
    protected $cache = null;

    public function __construct()
    {
        $this->cache = app('cache');
    }

    public function get($key, $default = null)
    {
        return $this->cache->get($key, $default);
    }

    public function set($key, $value, $ttl = null)
    {
        return $this->cache->set($key, $value, $ttl);
    }

    public function delete($key)
    {
        return $this->cache->rm($key);
    }

    public function clear()
    {
        return $this->cache->clear();
    }

    public function getMultiple($keys, $default = null)
    {
    }

    public function setMultiple($values, $ttl = null)
    {
    }

    public function deleteMultiple($keys)
    {
    }

    public function has($key)
    {
        return !is_null($this->cache->get($key));
    }

}
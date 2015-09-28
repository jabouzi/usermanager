<?php

class Cachefactory {

	private $cache;

	private $cache_conf = array(
					'host'		=> '127.0.0.1',
					'port'		=> 11211,
					'weight'	=> 1
				);

	function __construct()
	{
		$this->cache = false;
		if ( extension_loaded('memcached')) $this->cache = new Memcached();
		else if ( extension_loaded('memcache')) $this->cache = new Memcache();
		if ($this->cache) $this->connect($this->cache_conf['host'], $this->cache_conf['port']);
	}

	public function get($id)
	{
		if (!$this->cache) return false;
		
		$data = $this->cache->get($id);
		return (is_array($data)) ? $data[0] : FALSE;
	}

	public function save($id, $data, $ttl = 0)
	{
		if (!$this->cache) return false;
		
		return $this->cache->set($id, array($data, time(), $ttl), $ttl);
	}

	public function delete($id)
	{
		if (!$this->cache) return false;
		
		return $this->cache->delete($id);
	}

	public function clean()
	{
		if (!$this->cache) return false;
		
		return $this->cache->flush();
	}

	public function cache_info($type = NULL)
	{
		if (!$this->cache) return false;
		
		return $this->cache->getStats();
	}

	public function get_metadata($id)
	{
		if (!$this->cache) return false;
		
		$stored = $this->cache->get($id);

		if (count($stored) !== 3)
		{
			return FALSE;
		}

		list($data, $time, $ttl) = $stored;

		return array(
			'expire'	=> $time + $ttl,
			'mtime'		=> $time,
			'data'		=> $data
		);
	}
	
	public function connect($host , $port)
	{ 
		if (!$this->cache) return false;
		
		return $this->cache->addServer($host , $port); 
	} 

}


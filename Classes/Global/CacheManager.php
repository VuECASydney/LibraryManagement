<?php
/**
 * Author : Choongyeol Kim
 * Date Created : 15 October 2015
 * Date Modified : 
 */

class CacheManager
{
	const REDIS_HOST = 'localhost';
	const REDIS_PORT = 6379;
	const DEFAULT_TIMEOUT = 2.5; // 2.5 second timeout
	const DEFAULT_CACHING_TIME = 120; // valid : 120 sec

	public static function set($key, $value, $serializable)
	{
		return FALSE;
	}

	public static function get($key, $unserializable)
	{
		return NULL;
	}

	public static function del($key)
	{
		return FALSE;
	}
}
?>
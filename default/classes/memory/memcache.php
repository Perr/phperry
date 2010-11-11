<?php

class Memory extends Memcache
{
	private static $instance;

	/**
	 * Returns Singleton Instance
	 * @return Memory
	 */
	static function getInstance()
	{
		if (!self::$instance)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}

	function  __construct()
	{
		$this->addserver(Config::MEMCACHEDHOST);
	}

	static function DeleteObject($object, $idsarray = null)
	{
		$idstring = "";
		if (is_array($idsarray))
		{
			foreach ($idsarray as $id)
			{
				$idstring .= ":".$id;
			}
		}
		Memory::getInstance()->set(get_class($object).$idstring, null);
		return true;
	}

	static function StoreObject($object, $idsarray = null, $expire = 0, $compressed = false)
	{
		if ($compressed)
			$compressed = MEMCACHE_COMPRESSED;

		$idstring = "";
		if (is_array($idsarray))
		{
			foreach ($idsarray as $id)
			{
				$idstring .= ":".$id;
			}
		}
		Memory::getInstance()->set(get_class($object).$idstring, serialize($object), $compressed, $expire);
		return true;
	}

	static function RetreiveObject($class, $idsarray = null)
	{
		$idstring = "";
		if (is_array($idsarray))
		{
			foreach ($idsarray as $id)
			{
				$idstring .= ":".$id;
			}
		}
		$object = unserialize(Memory::getInstance()->get($class.$idstring));
		if ($object instanceof $class)
		{
			return $object;
		}
		return false;
	}

	static function RetreiveArray($name)
	{
		$arraysrl = Memory::getInstance()->get("_Array_".strval($name));
		if ($arraysrl)
		{
			$array = unserialize($arraysrl);
			if (is_array($array))
				return $array;
		}
		return false;
	}

	static function StoreArray($name, $value, $expire = 0, $compressed = false)
	{
		if ($compressed)
			$compressed = MEMCACHE_COMPRESSED;

		if (!is_array($value))
			return false;

		Memory::getInstance()->set("_Array_".strval($name), serialize($value), $compressed, $expire);
		return true;
	}

	static function RetreiveString($name)
	{
		$result = Memory::getInstance()->get("_String_".strval($name));
		if ($result)
		{
			return $result;
		}
		return false;
	}

	static function StoreString($name, $value, $expire = 0, $compressed = false)
	{
		if ($compressed)
			$compressed = MEMCACHE_COMPRESSED;

		Memory::getInstance()->set("_String_".strval($name), $value, $compressed, $expire);
		return true;
	}
}
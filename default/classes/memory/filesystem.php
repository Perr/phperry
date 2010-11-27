<?php

/**
 * File system storage, handy while under development to show whats being stored in memory
 * Be sure php has read/write access to the SAVEPATH constant location
 */
class Memory
{
	const SAVEPATH = "/var/www/classes/memory/tmp/";

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
		$filename = Memory::SAVEPATH."_Object_".get_class($object).$idstring;
		$file = fopen($filename, "w+");
		fwrite($file, serialize(null));
		fclose($file);
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
		$filename = Memory::SAVEPATH."_Object_".get_class($object).$idstring;
		$file = fopen($filename, "w+");
		fwrite($file, serialize($object));
		fclose($file);
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

		$filename = Memory::SAVEPATH."_Object_".$class.$idstring;
		if (!file_exists($filename))
			return false;

		$file = fopen($filename, "r");
		$object = unserialize(fread($file, filesize($filename)));
		fclose($file);
		if ($object instanceof $class)
		{
			return $object;
		}
		return false;
	}

	static function RetreiveArray($name)
	{
		$filename = Memory::SAVEPATH."_Array_".strval($name);
		if (!file_exists($filename))
			return false;

		$file = fopen($filename, "r");
		$arraysrl = fread($file, filesize($filename));
		fclose($file);
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

		$filename = Memory::SAVEPATH."_Array_".strval($name);
		$file = fopen($filename, "w+");
		fwrite($file, serialize($value));
		fclose($file);
		return true;
	}

	static function RetreiveString($name)
	{
		$filename = Memory::SAVEPATH."_String_".strval($name);
		if (!file_exists($filename))
			return false;

		$file = fopen($filename, "r");
		$result = fread($file, filesize($filename));
		fclose($file);
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

		$filename = Memory::SAVEPATH."_String_".strval($name);
		$file = fopen($filename, "w+");
		fwrite($file, $value);
		fclose($file);
		return true;
	}
}
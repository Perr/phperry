<?php

class Headers
{
	static function setContentType($headertype)
	{
		header('Content-type: '.$headertype);
	}

	static function setLocation($location)
	{
		header('Location: '.$location);
	}
}
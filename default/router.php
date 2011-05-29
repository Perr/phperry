<?php

class Router
{
	static function Route()
	{
		$param0 = strtolower(UrlParams::getParam(0));
		
		if(file_exists(Config::$CONTROLLERSPATH.$param0.".php"))
		{
			include Config::$CONTROLLERSPATH.$param0.".php";
			$controllername = $param0."Controller";
			$controller = new $controllername();
			$view = UrlParams::getParam(1);
			if(!$view) {
				$view = Config::$DEFAULTVIEW;
			}
			if(method_exists($controller, $view)) {
				$layout = Page::get();
				echo $layout->getHtml();
				$controller->$view();
				$viewfile = Config::$VIEWSPATH.$param0.DIRECTORY_SEPARATOR.$view.".phtml";
				if(file_exists($viewfile)) {
					include $viewfile;
				} else {
					echo "Warning: View '".$viewfile."' not found!";
				}
			} else {
				echo "Warning: Method '".$view."' not found in controller '".$controllername."'!";
			}
		}
	}

}

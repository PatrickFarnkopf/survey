<?php

class Main
{
	const POST 		= 0;
	const GET  		= 1;
	const SESSION 	= 2;

	public static $arguments;

	public static function start($argp, $argg, $args)
	{
		Main::$arguments[Main::POST] = $argp;
		Main::$arguments[Main::GET] = $argg;
		Main::$arguments[Main::SESSION] = $args;

		Main::Draw(Main::$arguments[Main::GET]['p']);
	}

	public static function Draw($page)
	{
		$loader = new \Application\ViewLoader($page);
		require_once $loader->getViewPath();
	}

	public static function POST($idx)
	{
		return isset(Main::$arguments[Main::POST][$idx]) ? Main::$arguments[Main::POST][$idx] : false;
	}

	public static function GET($idx)
	{
		return isset(Main::$arguments[Main::GET][$idx]) ? Main::$arguments[Main::GET][$idx] : false;
	}

	public static function SESSION($idx)
	{
		return isset(Main::$arguments[Main::SESSION][$idx]) ? Main::$arguments[Main::SESSION][$idx] : false;
	}

	public static function Redirect($url)
	{
		header('Location: ' . $url);
		exit;
	}
}

?>

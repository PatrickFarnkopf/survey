<?php

namespace Persistence;

class Context
{
	private function __construct() { }

	private static $userContext;

	public static function userContext()
	{
		if (Context::$userContext == null)
		{
			Context::$userContext = new Sql\UserContext(Context::getPdoObject());
		}

		return Context::$userContext;
	}

	private static $surveyContext;

	public static function surveyContext()
	{
		if (Context::$surveyContext == null)
		{
			Context::$surveyContext = new Sql\SurveyContext(Context::getPdoObject());
		}

		return Context::$surveyContext;
	}

	private static $surveyInfo;

	public static function surveyInfoContext()
	{
		if (Context::$surveyInfo == null)
		{
			Context::$surveyInfo = new Sql\SurveyChoiceInfoContext(Context::getPdoObject());
		}

		return Context::$surveyInfo;
	}

	private static function getPdoObject()
	{
		return new \PDO('mysql:host='.\Config\MySQL\HOSTNAME.';dbname='.\Config\MySQL\DATABASE, 
            \Config\MySQL\USERNAME, \Config\MySQL\PASSWORD
        );
	}
}

?>

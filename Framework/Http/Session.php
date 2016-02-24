<?php

namespace Framework\Http;

use Framework\Utils\UnorderedMap;

class Session extends UnorderedMap
{
    private static $instance;
    
    public function __construct(array $session)
    {
        $this->data = $session;
    }

    public function __destruct()
    {
        $_SESSION = $this->data;
    }

    public static function instance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Session($_SESSION);
        }

        return self::$instance;
    }
}

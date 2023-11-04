<?php

namespace Renms\FrontController;

class ConfigDB
{
    private static ?\mysqli $db = null;

    private function __construct()
    {

    }

    public static function getDatabase(): \mysqli
    {
        if (!self::$db) {
            self::$db = new \mysqli(
                'localhost',
                'root',
                '',
                'owndb'
            );
        }

        return self::$db;

    }

}
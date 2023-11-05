<?php

namespace Renms\FrontController;

class ConfigDB
{
    public const HOSTNAME = 'HOSTNAME';
    public const USERNAME = 'USERNAME';
    public const PASSWORD = 'PASSWORD';
    public const DATABASE = 'DATABASE';

    private static ?\mysqli $db = null;
    private static array $env = [];

    private function __construct()
    {

    }

    public static function getDatabase(): \mysqli
    {
        if (!self::$db) {
            $env = self::getParsedEnv();

            self::$db = new \mysqli(
                $env[self::HOSTNAME],
                $env[self::USERNAME],
                $env[self::PASSWORD],
                $env[self::DATABASE],
            );
        }

        return self::$db;

    }

    public static function getParsedEnv($byKey = false)
    {
        if (empty(self::$env)) {
            $env_file_contents = file_get_contents(__DIR__ . '/../.env');
            $lines = explode("\n", $env_file_contents);

            foreach ($lines as $line) {
                if (empty(trim($line)) || substr(trim($line), 0, 1) === '#') {
                    continue;
                }
                $ex = explode('=', $line);
                $key = preg_replace('/["\']/', '', trim($ex[0]));
                $value = preg_replace('/["\']/', '', trim($ex[1]));
                self::$env[$key] = $value;
            }
        }

        return $byKey ? self::$env[$byKey] ?? null : self::$env;
    }

}
<?php

namespace Renms\FrontController;

class ActiveRecords
{
    private static ?ActiveRecords $model = null;
    protected static \mysqli $mySql;

    private function __construct()
    {

    }

    public static function createActiveRecords(): ActiveRecords
    {
        self::$mySql = Registry::getInstance()->getProp('mysql');

        if (!self::$model) {
            self::$model = new self;
        }

        return self::$model;

    }

}
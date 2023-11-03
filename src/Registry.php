<?php

namespace Renms\FrontController;

class Registry
{
    private array $prop = [];
    private static ?Registry $instance = null;

    private function __construct()
    {

    }

    public static function getInstance(): Registry
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function getProp($key)
    {
        return $this->prop[$key] ?? null;
    }


    public function setProp($key, $value): void
    {
        $this->prop[$key] = $value;
    }


}
<?php

namespace Renms\FrontController;

class Controller
{
    private Registry $reg;
    private function __construct()
    {
        $this->reg = Registry::getInstance();
    }

    public static function run()
    {
        $instance = new self();
        $instance->init();
        $instance->handleRequest();
    }

    private function init()
    {
        $this->reg->setProp('mysql', ConfigDB::getDatabase());
        $this->reg->setProp('activeRecords', ActiveRecords::createActiveRecords());
        $this->reg->setProp('json', file_get_contents('php://input'));
    }

    private function handleRequest()
    {
        echo User::getUserList();

        $this->reg->getProp('mysql')->close();

    }

}
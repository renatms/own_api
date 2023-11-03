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
        $this->reg->setProp('renat', file_get_contents('php://input'));
    }

    private function handleRequest()
    {
        echo "handle: \n";
        //print_r($this->reg->getProp('renat'));
        print_r($this->reg->getProp('renat'));
    }

}
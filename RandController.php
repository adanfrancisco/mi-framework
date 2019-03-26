<?php

//namespace Mixplay;


class RandController implements ControllerInterface
{
    public static function get()
    {
        return rand(1,99999999);
    }
    public static function post()
    {
        return rand(1,100);
    }
}

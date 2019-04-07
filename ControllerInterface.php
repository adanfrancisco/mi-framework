<?php
//namespace Mixplay;


interface ControllerInterface
{
    public static function get($request,$argv);
    public static function post($request,$argv);
}

<?php

//namespace Mixplay;


class RandController implements ControllerInterface
{
    public static function get()
    {
        return 'un numero random por GET: '. rand(1,99999999);
    }
    public static function post()
    {
        $array = [];
        $array['status'] = 200;
        $array['message'] = 'un numero random por POST: '. rand(1,100);
        return json_encode($array);
    }
}

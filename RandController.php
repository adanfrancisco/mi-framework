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
        $min = isset($_POST['min']) ? $_POST['min'] : 1;
        $max = isset($_POST['max']) ? $_POST['max'] : 10;
        $array = [];
        $array['status'] = 200;
        $array['message'] = 'un numero random por POST entre '.$min.' - '.$max.': '.  rand( $min, $max);
        return json_encode($array);
    }
}

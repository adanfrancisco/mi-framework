<?php

//namespace Mixplay;

class RandController implements ControllerInterface
{
    
    public static function get($request,$argv)
    {
        //var_dump($_GET);
        //var_dump( $request);
        $min = isset($argv['min']) ? $argv['min'] : 1;
        $max = isset($argv['max']) ? $argv['max'] : 10;
        return 'un numero random por GET entre '.$min.' - '.$max.': '. rand($min, $max);
    }

    public static function post($request,$argv)
    {
        $min = isset($argv['min']) ? $argv['min'] : 1;
        $max = isset($argv['max']) ? $argv['max'] : 10;
        $array = [];
        $array['status'] = 200;
        $array['message'] = 'un numero random por POST entre '.$min.' - '.$max.': '.  rand( $min, $max);
        return json_encode($array);
    }
}



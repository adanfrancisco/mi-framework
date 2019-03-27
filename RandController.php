<?php

//namespace Mixplay;


class RandController implements ControllerInterface
{
    
    public static function get()
    {
        //var_dump($_GET);
        $min = isset($_GET['min']) ? $_GET['min'] : 1;
        $max = isset($_GET['max']) ? $_GET['max'] : 10;
        return 'un numero random por GET entre '.$min.' - '.$max.': '. rand($min, $max);
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

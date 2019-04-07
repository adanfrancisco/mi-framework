<?php

//namespace Mixplay;


class NameController implements ControllerInterface
{    

    public static function get($request,$argv)
    {
        if( isset( $_GET['name']))
        {
            return 'tu nombre es: '. $_GET['name'] . ' por GET';
        }

    }
    public static function post($request,$argv)
    {
        if( isset( $_POST['name']) && isset( $_POST['surname'])   )
        {
            return 'tu nombre es: '. $_POST['surname'] .', '. $_POST['name'] . ' por POST';
        }
    }
    
}

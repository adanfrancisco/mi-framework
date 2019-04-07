<?php

class Routes 
{
    private $rutes = [];
    private $methodsSets = [];
    

    public function setRute(string $method, string $allRute, $controller)
    {   
        $aux = explode("{",$allRute); 
        $realRute = $aux[0]; // trae la ruta sin parametros
        $auxParam = explode( "/", substr( $allRute, strlen($realRute) ) ); 
        $indice = $this->countArguments($auxParam);
        //echo $indice;
        if( empty($this->rutes[$realRute][$indice]) ){
            $this->rutes[$realRute][$indice]['controller'] = $controller;

            $this->methodsSets[$realRute][$indice][strtolower($method)]= true;
            if(is_array($auxParam))
            {
                foreach ($auxParam as $key => $value) { 
                    if(!empty($value)){
                        $value = trim($value, "{}");
                        $this->rutes[$realRute][$indice][$key+1] = $value;
                    }
                }
            }
            $this->rutes = $this->rutes ;
        }else{
            echo 'you are overwriting a method.';
        }
        
        
    }
    public function printRutes()
    {
        return $this->rutes;
        //return $this->methodsSets;
    }
    public function getRute(string $method, string $rute, int $countArguments )
    {
        //var_dump($countArguments);

        if($this->posible($rute.'/', $method, $countArguments)  )
        {
            $respuesta = $this->rutes[$rute.'/'][$countArguments];
            //var_dump($this->rutes[$rute.'/']);
            //die;
            if ( (count($respuesta )-1) == $countArguments) {
                return $respuesta;
            }else {
                return 'method not allowed';
            }
        }else {
            return 'method not allowed';
        }
    }
    public function posible(string $rute, string $method, int $countArguments) 
    {
        //var_dump( isset($this->methodsSets[$rute][$countArguments][$method]));
        
        //var_dump($countArguments);

        return isset( $this->methodsSets[$rute][$countArguments][$method]);
    }
    public function countArguments( $argv):int 
    {
        $count=0;
        foreach ($argv as $value) {
            
            if(!empty($value)){
                $count++;
            }
        }
        return $count;
    }
}
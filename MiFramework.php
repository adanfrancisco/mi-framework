<?php

//namespace Mixplay;

class MiFramework
{
    private $rutes;
    // private $methodsSets = [];
    private $rute = '';
    private $method = '';
    private $argv;
    public function __construct()
    {   
        //var_dump($_SERVER);
        $url = $_SERVER['REQUEST_URI'];
        $urlFull = strlen($_SERVER['REQUEST_URI']);
        $urlFake = strlen($_SERVER['SCRIPT_NAME']);
        $script = strlen('index.php');
        $this->argv = explode("/", substr( $url , - ( $urlFull - ($urlFake-$script) )  ) );
        $this->rute = $this->argv[0];        
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->rutes = new Routes;
    }

    public function get() 
    {
        $argv = [];
        $result = $this->rutes->getRute($this->method, $this->rute,$this->countArguments($this->argv));
        //var_dump($result);
        //var_dump($this->argv);

        //var_dump($this->rutes->printRutes());
        
        if(!is_string($result) ){
            if(count($result)>1){
                for ($i=1; $i < count($this->argv); $i++) { 
                    //var_dump($this->rutes);
                    //var_dump($this->argv);
                    $argv[$result[$i]] = $this->argv[$i] ;
                }
            }  
                if(!empty($argv)){
                    $this->argv = $argv; 
                }
                return $result['controller']::get($_REQUEST,$this->argv);

            
        }else {
            return $result;
        }
    }
    public function post() 
    {
        //echo $this->rute;
        //echo $this->method;
        return $this->rutes[$this->rute]::post($_REQUEST, $this->argv);

    }
    public function setRute(string $method, string $rute, $controller)
    {
        $this->rutes->setRute($method,$rute,$controller);
        //var_dump($this->rutes->printRutes());
        
    }  
    
    
    
    public function run()
    {
        $m = $this->method;
        return $this->$m();
    }

    public function countArguments( $argv):int 
    {
        $count=0;
        foreach ($argv as $value) {
            //echo "$value </br>";
            if(!empty($value)){
                $count++;
            }
        }
        return $count-1;
    }
}
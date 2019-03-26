<?php

//namespace Mixplay;

class MiFramework
{
    private $rutes = [];

    public function getRutes() 
    {
        return $this->rutes;
    }    
    public function get(string $rute) 
    {
        return $this->rutes['GET'][$rute]->get();
    }
    public function post(string $rute) 
    {
        return $this->rutes['POST'][$rute]->post();
    }
    public function setRute(string $method, string $rute, $function)
    {
        $this->rutes[$method][$rute] = $function; 
    }
}
<?php

class Cancion {

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }
    
    function __construct(){                
        $this->load->model('Modelo_Cancion','modelo');
    }

    function obtenerCanciones()
    {
        return $this->modelo->obtenerCanciones(3);
    }
}
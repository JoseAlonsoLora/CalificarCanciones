<?php

class Calificacion {

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }
    
    function __construct(){                
        $this->load->model('Modelo_Calificacion','modelo');
    }

    function guardarCalificacion($canciones){
        return $this->modelo->guardarCalificacion($canciones);
    }

}
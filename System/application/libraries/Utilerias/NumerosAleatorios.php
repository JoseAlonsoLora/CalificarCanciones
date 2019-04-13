<?php

class NumerosAleatorios {    

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }
    
    function __construct(){                
        
    }

    function obtenerNumerosNoRepetidos($listaNumeros, $limite, $listaNumerosRepetidos)
    {
        $numerosAleatorios = array();        
        for($i = 0; $i < $limite;){
            $rand = rand( 1, count($listaNumeros) );
            $estaCalificada = array_search($rand, $this->listaNumerosRepetidos);
            if (!$estaCalificada){
                array_push($this->listaNumerosRepetidos, $rand);
                array_push($numerosAleatorios, $rand);
                $i++;
            }
        }        
        return $numerosAleatorios; 
    }
}
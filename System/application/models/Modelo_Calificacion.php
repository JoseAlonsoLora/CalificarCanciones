<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelo_Calificacion extends CI_Model {
    private $mapaCalificaciones;

    function __construct(){
        $this->load->database();
        $this->load->helper('url');
        $mapaCalificaciones = array (
            1 => "uno",
            2 => "dos",
            3 => "tres",
            4 => "cuatro",
            5 => "cinco"
        );
    }

    function guardarCalificacion($calificaciones){
        try{
            foreach ($calificaciones as &$calificacion) {
                $columna = $mapaCalificaciones[$calificacion.calificacion];
                $this->db->set($columna, $columna+ '+1', FALSE);
                $this->db->where('can_id', $calificacion.can_id);
                $this->db->update('canciones');
            }
            return array('message'=> 'success');
        }catch(Exception $e){
            return array('message'=> 'error');
        }
        
    }
}
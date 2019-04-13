<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelo_Cancion extends CI_Model {    

    function __construct(){
        $this->load->database();        
    }

    function obtenerNumerosAleatorios($canciones_id_list,$limite){
        $numerosAleatorios = array();        
        for($i = 0; $i < $limite; $i++){
            $rand = rand( 1, count($canciones_id_list) );                          
            array_push($numerosAleatorios, $rand);
        }        
        return $numerosAleatorios;
    }

    function obtenerCanciones($limite)
    {
        $canciones_id_list = $this->db->query("SELECT can_id FROM canciones")->result_array();
        $numerosAleatorios = $this->obtenerNumerosAleatorios($canciones_id_list,$limite);               
        $canciones = array();        
        foreach ($numerosAleatorios as &$valor) {
            $rand_bug_id = $canciones_id_list[$valor]["can_id"];
            $this->db->select('canciones.can_id, canciones.can_titulo, artistas.art_nombre ');
            $this->db->from('canciones');
            $this->db->join('artistas', 'artistas.art_id  = canciones.can_artista ');
            $this->db->where('canciones.can_id', $rand_bug_id);
            $cancion = $this->db->get();
            array_push($canciones, $cancion->row());
        }                  
        return $canciones;   
    }


}
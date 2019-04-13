<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelo_auth extends CI_Model {

    function __construct(){
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    function existeLaSesionElDato($dato){
        return $this->session->userdata($dato);
    }

    function datosDelUsusario($usuario){
        return $this->db->get_where('User', ['username' => $email])->row_array();
    }
    
	function datosDeUsuarioId($id){
		return $this->db->get_where('User', ['idUser' => $id])->row_array();
	}

	function esUsuarioValido($email, $password){
		return $this->db->where('username', $email)->where('password', hash("sha256", $password))->get('User')->num_rows()>0;
	}

	function guardarUsuarioSesion($usuario){
		$this->session->set_userdata('User',$usuario);
	}

	function eliminarDatosSesion($usuario){
		$this->session->unset_userdata($usuario);
	}


}
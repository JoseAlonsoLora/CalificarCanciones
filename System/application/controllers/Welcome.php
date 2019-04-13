<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->library('Cancion');
		$this->load->library('Calificacion');
    }

	public function index()
	{		
		$this->load->view('WelcomeView');
	}

	public function obtenerCanciones()
	{
		echo json_encode($this->cancion->obtenerCanciones());
	}

	public function calificarCanciones(){
		$canciones = $_POST["calificaciones"];		
		$this->calificacion->guardarCalificacion($canciones);		
	}	
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pacienteajax extends CI_Controller {

    function __construct()
    {    
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('ajax/login');
    }
    
    function validarlogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    }
}
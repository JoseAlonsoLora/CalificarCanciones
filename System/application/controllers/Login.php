<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('Auth');
    }


	public function index()
	{
        if($this->auth->estaLogueadoElUsuario()){
            redirect('Welcome', 'refresh');
        }
        $this->load->view('LoginView');	
    }
    
    public function loginUser()
    {    
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($this->auth->esUsuarioValido($username, $password)){
            $this->auth->guardarUsuarioSesion($username, $password);
            redirect('Welcome', 'refresh');
        }else{
            echo "<script>alert('Usuario y/o Contraseña incorrectos')</script>";
            $this->load->view('Login');
        }
    }

    public function cerrarSesion(){
        $this->auth->terminaSesionUsuario();
        redirect('Login', 'refresh');
    }
}
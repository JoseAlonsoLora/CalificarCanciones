<?php

class Auth {

    public function __get($attr){
        return CI_Controller::get_instance()->$attr;
    }
    
    function __construct(){                
        $this->load->model('Modelo_auth','modelo');
    }

    function estaLogueadoElUsuario(){
        return $this->modelo->existeLaSesionElDato('username');
    }

    function datosDelUsuario($usuario){
        return $this->modelo->datosDelUsuario($usuario);
    }

    function esUsuarioValido($username, $password){
		return $this->modelo->esUsuarioValido($username, $password);
	}

	function guardarUsuarioSesion($username, $password){
		if ($this->esUsuarioValido($username, $password)){
			$datos = $this->modelo->datosDelUsusario($username);
			$this->modelo->guardarUsuarioSesion($datos['idUser']);
		}
	}

	function terminaSesionUsuario(){
		$this->modelo->eliminarDatosSesion('User');
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model{

  var $table = 'User';

  function __construct(){
    parent:: __construct();
  }



  function login ($username, $password){
    $this -> db -> select('username');
    $this -> db -> from('User');
    $this -> db -> where('username', $username);
    $this -> db -> where('password', $password);
    $this -> db -> limit(1);
    $query = $this -> db -> get();
    
    if($query -> num_rows() == 1){
      return $query->result();
    }else{
      return false;
    }
  }

  
}
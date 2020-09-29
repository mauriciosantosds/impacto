<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function returnuser($login, $pass){
        $this->db->where('userlogin', $login);
        $this->db->where('userpass', $pass);
        return $this->db->get('impauser',1);
    }
}
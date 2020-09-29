<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
		parent::__construct();
	}
	public function index(){

        $this->load->view('login/index');
    }
    
    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login','required|min_length[3]');
        $this->form_validation->set_rules('password','Senha','required|min_length[8]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $login = $this->input->post('login');
            $pass = $this->input->post('password');
            $this->load->model('login_model', 'login');
            $passSha512 = hash('sha512', $pass);
            $user = $this->login->returnuser($login, $passSha512);
            if ($user->num_rows() > 0) {
                $user = $user->result_object()[0];
                $sesdata = array(
                    'username'  => $user->username,
                    'userlogin'     => $user->userlogin,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sesdata);
                redirect(base_url('dash'));
            } else  {
                $this->session->set_flashdata('msg','Login ou senha inválidos');
                redirect(base_url('login'));
            }
            //redirect(base_url('Dash'));
        /* } else {
            $data['error'] = "usuario ou senha inválidos";
            $this->load->view("login/index", $data);
        } */
        }
    }

    function logout() {
      $this->session->sess_destroy();
      $this->index();
    }

}

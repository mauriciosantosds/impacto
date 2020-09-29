<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cadastrar extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/cadastrar');
		$this->load->view('html-footer');
    }
    public function adicionar(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('tipo','Tipo','required');
		$this->form_validation->set_rules('situ','Situação','required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			echo $this->input->post('tipo');
			echo $this->input->post('situ');
			echo $this->input->post('def');
			echo $this->input->post('vlr');
			echo $this->input->post('desc');
		}	
	}
	
	public function pesquisar() {
		echo "<a href=\"javascript:idCliente(3);\">João</a>
				<br><a href=\"javascript:idCliente(4);\">José</a>
                <br><a href=\"javascript:idCliente(5);\">Joares</a>
                <br><a href=\"javascript:idCliente(6);\">Joacir</a>";
	}

}

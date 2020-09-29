<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alterar extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/alterar');
		$this->load->view('html-footer');
    }
    public function alterar($id){
		$p1 = new stdClass;
		$p1->id = $id;
		$p1->ean = 23232323;
		$p1->descricao = 'catalisador';
		$produto = array($p1);
		$data['produto'] = $produto;
		$p2 = new stdClass;
		$p2->id = 0;
		$p2->idos = 0;
		$p2->descricao = "";
		$p2->qtd = 0;
		$produtos = array($p2);
		$data['produtos'] = $produtos;
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('produto/alterar',$data);
		$this->load->view('html-footer');
	}
	
	public function salvarAlteracao() {
		$data['id'] = $this->input->post('codigo');
		$data['codbar'] = $this->input->post('codbar');
        $data['desc'] = $this->input->post('desc');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('codbar','Código de barras','required|min_length[5]');
        $this->form_validation->set_rules('desc','Descrição','required|min_length[8]');
        if ($this->form_validation->run()) {
			$this->index();
		} else {
			$this->alterar($this->input->post('codigo'));
		} 
	}

}

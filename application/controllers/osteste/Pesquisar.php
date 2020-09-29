<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pesquisar extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/pesquisar');
		$this->load->view('html-footer');
    }
    public function pesquisar(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('cli','Cliente','required');
        if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$campos = array('cli'=>$this->input->post('cli'),
							'idcli'=>$this->input->post('idcli'),
							'tipo'=>$this->input->post('tipo'),
							'situ'=>$this->input->post('situ'),
							'def'=>$this->input->post('def'));
			$this->resultadoPesq($campos);
		}
	}
	
	public function resultadoPesq($campos) {
		$os1 = new stdClass;
		$os1->id = 1;
		$os1->tipo = (strcasecmp($campos['tipo'], 'oc')) ? 'Ordem de serviço' : 'Orçamento';
		$os1->situacao = $campos['situ'];
		$os1->defeito = $campos['def'];
		$os1->valor = 22.04;
		$os1->desconto = 10;
		$os1->idcli = $campos['idcli'];
		$os1->cliente = $campos['cli'];
		$lista = array($os1);	
		$data_lista['oss'] = $lista;
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/listar',$data_lista);
		$this->load->view('html-footer');
	}

}

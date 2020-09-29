<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listar extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
		$os1 = new stdClass;
		$os1->id = 1;
		$os1->tipo = "Ordem de serviço";
		$os1->situacao = "arguardando aprovação do cliente";
		$os1->defeito = "cabeçote quebrado";
		$os1->valor = 22.04;
		$os1->desconto = 10;
		$lista = array($os1);	
		$data_lista['oss'] = $lista;
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/listar',$data_lista);
		$this->load->view('html-footer');
	}
	
	public function deletar($id) {
		echo $id;
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produto extends CI_Controller {
    public function __construct(){
        parent::__construct();
	}
	public function index($pesquisa = ''){
		$lista;
		if ($pesquisa) {
			$produto1 = new stdClass;
			$produto1->id = 1;
			$produto1->descricao = $pesquisa['desc'];
			$produto1->ean = $pesquisa['codbar'];
			$lista = array($produto1);
		} else {
			$produto1 = new stdClass;
			$produto1->id = 1;
			$produto1->descricao = "Parafuso Produto";
			$produto1->ean = "1231231231";
			$produto2 = new stdClass;
			$produto2->id = 2;
			$produto2->ean = "2222221231";
			$produto2->descricao = "Tampa motor";
			$lista = array($produto1,$produto2);
		}
			
		$data_lista['produtos'] = $lista;
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('produto/listar',$data_lista);
		$this->load->view('html-footer');
	}
    public function cadastrar(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('produto/cadastrar');
		$this->load->view('html-footer');
    }
    public function salvar_cadastro(){
		$this->load->library('form_validation');
		$this->load->helper('form');
        $this->form_validation->set_rules('codbar','Código de barras','required|min_length[5]');
        $this->form_validation->set_rules('desc','Descrição','required|min_length[8]');
        if ($this->form_validation->run()) {
			$this->index();
		} else {
			$this->cadastrar();
		}
	}

	public function alterar($id){
		$p1 = new stdClass;
		$p1->id = $id;
		$p1->ean = 23232323;
		$p1->descricao = 'catalisador PRoduto';
		$produto = array($p1);
		$data['produto'] = $produto;
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('produto/alterar',$data);
		$this->load->view('jsscripts.php');
		$this->load->view('html-footer');
	}

	public function salvar_alteracao() {
		$data['id'] = $this->input->post('codigo');
		$data['codbar'] = $this->input->post('codbar');
        $data['desc'] = $this->input->post('desc');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('codbar','Código de barras','required|min_length[5]');
        $this->form_validation->set_rules('desc','Descrição','required|min_length[8]');
        if ($this->form_validation->run()) {
			var_dump($data);
			//$this->index();
		} else {
			$this->alterar($this->input->post('codigo'));
		} 
	}

	public function pesquisar(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('produto/pesquisar');
		$this->load->view('jsscripts.php');
		$this->load->view('html-footer');
	}
	
	public function efetuar_pesquisa(){
		$this->load->library('form_validation');
		$this->load->helper('form');
        $this->form_validation->set_rules('codbar','Código de barras','min_length[5]');
        $this->form_validation->set_rules('desc','Descrição','required|min_length[8]');
        if ($this->form_validation->run()) {
			$pesquisa = array('codbar'=>$this->input->post('codbar'),
								'desc'=>$this->input->post('desc')
						);
			$this->index($pesquisa);
		} else {
			$this->pesquisar();
		}	
    }
	
	public function deletar($id) {
		echo $id;
		echo "ok";
	}

}

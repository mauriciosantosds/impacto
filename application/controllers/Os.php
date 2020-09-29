<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Os extends CI_Controller {
	private $id;
    public function __construct(){
		parent::__construct();
		$this->load->helper('js');
	}
	public function index($pesquisa = ''){
		$lista;
		if($pesquisa) {
			
			$os1 = new stdClass;
			$os1->id = 1;
			$os1->tipo = (strcasecmp($pesquisa['tipo'], 'oc')) ? 'Ordem de serviço' : 'Orçamento';
			$os1->situacao = $pesquisa['situ'];
			$os1->defeito = $pesquisa['def'];
			$os1->valor = 33;
			$os1->desconto = 10;
			$os1->cliente = $pesquisa['cli'];
			$lista = array($os1);
		} else {
			$os1 = new stdClass;
			$os1->id = 1;
			$os1->tipo = "Ordem de serviço";
			$os1->situacao = "arguardando aprovação do cliente";
			$os1->defeito = "cabeçote quebrado";
			$os1->valor = 22.04;
			$os1->desconto = 10;
			$os1->cliente = 'Cronosvaldo';
			$lista = array($os1);	
		}
		
		$data_lista['oss'] = $lista;
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/listar',$data_lista);
		$data['js'] = load_js(array('jquery-2.1.3.min.js','bootstrap.min.js'));
		$this->load->view('html-footer',$data);
	}
    public function cadastrar(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/cadastrar');
		$data['js'] = load_js(array('jquery-2.1.3.min.js','bootstrap.min.js','os/pesqcliente.js'));
		$this->load->view('html-footer',$data);
    }
    public function salvar_cadastro(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('situ','Situação','required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
			$this->cadastrar();
		} else {
			echo $this->input->post('cli');
			echo $this->input->post('idcli');
			echo $this->input->post('tipo');
			echo $this->input->post('situ');
			echo $this->input->post('def');
			echo $this->input->post('vlr');
			echo $this->input->post('desc');
		}	
	}
	
	public function pesquisarcli() {
		echo "<a href=\"javascript:idCliente(3);\">". $_GET["clien"] ."</a>
				<br><a href=\"javascript:idCliente(4);\">José</a>
                <br><a href=\"javascript:idCliente(5);\">Joares</a>
                <br><a href=\"javascript:idCliente(6);\">Joacir</a>";
	}

	public function pesquisar(){
        $this->load->helper('text');
        $this->load->view('html-header');
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('os/pesquisar');
		$this->load->view('jsscripts.php');
		$this->load->view('html-footer');
    }
    public function efetuar_pesquisa(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('cli','Cliente','required');
        if ($this->form_validation->run() == FALSE) {
			$this->pesquisar();
		} else {
			$pesquisa = array('cli'=>$this->input->post('cli'),
							'idcli'=>$this->input->post('idcli'),
							'tipo'=>$this->input->post('tipo'),
							'situ'=>$this->input->post('situ'),
							'def'=>$this->input->post('def'));
			$this->index($pesquisa);
		}
	}
	
    public function alterar($id){
		$this->id = $id;
		$os1 = new stdClass;
		$os1->id = $id;
		$os1->tipo = "os";
		$os1->situacao = "arguardando aprovação do cliente";
		$os1->defeito = "cabeçote quebrado";
		$os1->valor = 22.04;
		$os1->desconto = 10;
		$os1->cliente = 'Cronosvaldo';
		$os1->idcli = 4;
		$os = array($os1);
		$data['os'] = $os;
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
		$this->load->view('os/alterar',$data);
		$data['js'] = load_js(array('jquery-2.1.3.min.js','bootstrap.min.js','os/pesqproduto.js','os/addproduto.js'));
		$this->load->view('html-footer',$data);
	}

	public function pesquisar_eanp() {
		echo "<a href=\"javascript:idProduto(3);\">".$_GET["eanp"]."</a>
				<br><a href=\"javascript:idProduto(4);\">José</a>
                <br><a href=\"javascript:idProduto(5);\">Joares</a>
                <br><a href=\"javascript:idProduto(6);\">Joacir</a>";
	}

	public function pesquisar_descp() {
		echo "<a href=\"javascript:idProduto(3);\">".$_GET["descp"]."</a>
				<br><a href=\"javascript:idProduto(4);\">José</a>
                <br><a href=\"javascript:idProduto(5);\">Joares</a>
                <br><a href=\"javascript:idProduto(6);\">Joacir</a>";
	}


	public function add_produto() {
		$p1 = new stdClass;
		$p1->id = $_POST["id"];
		$p1->ean = "2342342324";
		$p1->idos = 2;
		$p1->descricao = "teste";
		$p1->qtd = $_POST["qtd"];
		echo "<tr>
			<td>
				<div class='btn-group' role='group' aria-label='...'>
				".anchor( base_url('alterarprod/' . $p1->idos), '<i class="glyphicon glyphicon-edit"></i>','class="btn btn-warning"')
				,anchor( base_url('deletarprod/' . $p1->idos), '<i class="glyphicon glyphicon-erase"></i>','class="btn btn-danger"')."</div>
			</td> 
			<td>{$p1->descricao}</td> 
			<td>{$p1->qtd}</td>
		</tr>" ; 
			
	}
	
	public function salvar_alteracao() {
        $this->load->library('form_validation');
		$this->form_validation->set_rules('cli','Cliente','required|min_length[5]');
        if ($this->form_validation->run()) {
			$data['idos'] = $this->input->post('idos');
			$data['idcli'] = $this->input->post('idcli');
			$data['cli'] = $this->input->post('cli');
			$data['tipo'] = $this->input->post('tipo');
			$data['situ'] = $this->input->post('situ');
			$data['def'] = $this->input->post('def');
			$data['vlr'] = (float) $this->input->post('vlr');
			$data['desc'] = (float) $this->input->post('desc');
			var_dump($data);
		} else {
			$this->alterar($this->input->post('idos'));
		} 
	}
	public function deletar($id) {
		echo $id;
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagseg extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('pagseguro');
        $this->load->library('myconf');
    }
    
	public function notification() {
        header("access-control-allow-origin: https://pagseguro.uol.com.br");
        $this->load->library('pagseguro');

        if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
            $response = $this->pagseguro->executeNotification($_POST);
            if( $response->status==3 || $response->status==4 ){
                //PAGAMENTO CONFIRMADO
                //ATUALIZAR O STATUS NO BANCO DE DADOS
                echo $this->pagseguro->getStatusText($PagSeguro->status);
            }else{
                //PAGAMENTO PENDENTE
                echo $this->pagseguro->getStatusText($PagSeguro->status);
            }
        }
    }

    public function checkout() {       
        header("access-control-allow-origin: https://pagseguro.uol.com.br");
        header("Content-Type: text/html; charset=UTF-8",true);
        date_default_timezone_set('America/Sao_Paulo');

        $id = $this->input->post("id");
        $email = $this->input->post("email");
        $token = $this->input->post('g-recaptcha-response');
		$this->load->model('course_model');
		$course = $this->course_model->find($id)->result_array()[0];
        if ($this->sendemailsell($email, $token, $course["coursname"])) {
            //EFETUAR PAGAMENTO	
            $venda = array("codigo"=>"1",
                        "valor"=>$course["coursamo"],
                        "descricao"=>$course["coursname"],
                        "nome"=>"Maurício dos Santos",
                        "email"=>$email,
                        "telefone"=>"(51) 99212-1696",
                        "rua"=>"",
                        "numero"=>"",
                        "bairro"=>"",
                        "cidade"=>"",
                        "estado"=>"", //2 LETRAS MAIÚSCULAS
                        "cep"=>"",
                        "codigo_pagseguro"=>"");
                        /* var_dump($venda); */
                        
            $this->pagseguro->executeCheckout($venda,"https://www.impactodesenvolvimento.com.br/pagseg/pedido/");
        } else {
            redirect(base_url());
        }
        
    }

    public function pedido() {
        //RECEBER RETORNO
        if( isset($_GET['codigo']) ){
            $pagamento = $this->pagseguro->getStatusByCode($_GET['codigo']);
            
            echo $pagamento;
            if($pagamento==3 || $pagamento==4){
                //ATUALIZAR DADOS DA VENDA, COMO DATA DO PAGAMENTO E STATUS DO PAGAMENTO
                echo "Pago";
            }else{
                //ATUALIZAR NA BASE DE DADOS
                echo "Não pago";
            }
        }
    }

    private function sendemailsell($email, $token, $curso) {
		
		//$ip = $_SERVER['REMOTE_ADDR'];
		$message = "O visitante <br>\n e-mail: ".
		$email." demonstrou interesse em adquirir o curso: ".$curso;

		// post request to server
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array('secret' => $this->myconf->secretKey, 'response' => $token);
		$data = http_build_query($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$resposta = curl_exec($ch);
		curl_close ($ch);

		$response = json_decode($resposta, true);
		if ($response["success"]) {
			$this->load->library("email");
			$this->email->from($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->to($this->myconf->emailServer, $this->myconf->nameEmailSe);
			$this->email->reply_to($email);
			$this->email->subject('Compra de curso');
			$this->email->message($message);
			if($this->email->send()){
				return true;
			} else {
				log_message('debug',$this->email->print_debugger());
			}
		} else {
			return false;
        }
        return false;
    }
}
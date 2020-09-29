<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller {
		
    public function __construct() {
			parent::__construct();
			$this->load->library("Myconf");
		}


    public function index(){
			$this->load->view('principal/html-head');
			$this->load->view('principal/html-menu');
			$this->load->view('principal/home-section');
			$this->load->model('course_model');
			if ($this->course_model->findAll()->num_rows() > 0 ) {
				$courses = $this->course_model->findAll()->result_array();
				$data["courses"] = $courses;
				$this->load->view('principal/courses-section', $data);
				
			}	
			$this->load->view('principal/programs-section');
			$this->load->view('principal/teachers-section');
			$this->load->view('principal/contact-section');
			$this->load->view('principal/html-footer');
	}

	public function course_single() {
		$id = $this->input->get("id");
		$this->load->model('course_model');
		$data["course"] = $this->course_model->find($id)->result_array()[0];
		$data["courses"] = $this->course_model->findAll()->result_array();
		$this->load->view('principal/html-head');
		$this->load->view('principal/html-menu');
		$this->load->view('principal/course-single', $data);
		$this->load->view('principal/html-footer');
	}
	
	public function newsletter() {
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$telphone = $this->input->post('telphone');
		$token = $this->input->post('g-recaptcha-response');
		
		//$ip = $_SERVER['REMOTE_ADDR'];

		$message = "O visitante ".$name."<br>\n e-mail: ".
		$email.
		"<br>\n telefone: ".$telphone." demonstrou interesse em participar da newsletter";

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
			$this->email->reply_to($email, $name);
			$this->email->subject('Newsletter Impacto Desenvolvimento');
			$this->email->message($message);
			if($this->email->send()){
				echo "200";
			} else {
				log_message('debug',print_r($this->email->print_debugger()));
			}
		} else {
			echo "not ok";
		}
	}

	public function sendmessage() {
		$name = $this->input->post('name');
		$lname = $this->input->post('lname');
		$subject = $this->input->post('subject');
		$email = $this->input->post('email');
		$message = $this->input->post('message');
		$token = $this->input->post('g-recaptcha-response');
		$text = "Nome: ".$name." ".$lname."<br>\n";
		$text .= "E-mail: ".$email."<br>\n";
		$text .= $message;

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
			$this->email->reply_to($email, $name);
			$this->email->subject($subject);
			$this->email->message($text);
			if($this->email->send()){
				echo "200";
			} else {
				log_message('debug',print_r($this->email->print_debugger()));
			}
		} else {
			echo "not ok";
		}
	}

	public function newsletterFooter() {
		$email = $this->input->post('email');
		$token = $this->input->post('g-recaptcha-response');
		
		//$ip = $_SERVER['REMOTE_ADDR'];

		$message = "O visitante <br>\n e-mail: ".
		$email.
		" demonstrou interesse em participar da newsletter";

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
			$this->email->subject('Newsletter Impacto Desenvolvimento');
			$this->email->message($message);
			if($this->email->send()){
				echo "200";
			} else {
				log_message('debug', $this->email->print_debugger());
			}
		} else {
			echo "not ok";
		}
	}
}

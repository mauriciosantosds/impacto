<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect(base_url('login'));
		}
		$this->load->model('course_model');
	}
	public function index(){
		$this->load->view('dash/principal');
		$this->load->view('dash/menu');
		$this->load->view('dash/form-curso');
		$this->load->view('dash/footer');
	}

	public function buy() {
		echo $this->input->post('description');
		echo $this->input->post('amount');
	}

	public function course() {
		$this->load->view('dash/principal');
		$this->load->view('dash/menu');
		$this->load->view('dash/form-curso');
		$this->load->view('dash/footer');
	}

	public function register_course() {
		$data = array(
		'id' => $this->input->post('id'),
        'coursname' => $this->input->post('name'),
        'coursdesc' => $this->input->post('desc'),
        'courswork' => $this->input->post('workload'),
        'courshour' => $this->input->post('hour'),
        'coursamo' => $this->input->post('amount')
    	);
		if ($this->course_model->save($data)) {
			$data['alert'] = "Curso cadastrado!";
			$this->load->view('dash/principal');
			$this->load->view('dash/menu');
			$this->load->view('dash/form-curso', $data);
			$this->load->view('dash/footer');
		}
	}

	public function list_course() {
		$courses = $this->course_model->findAll()->result_array();
		$data["courses"] = $courses;
		$this->load->view('dash/principal');
		$this->load->view('dash/menu');
		$this->load->view('dash/table-course', $data);
		$this->load->view('dash/footer');
				
	}

	public function update_course() {
		$id = $this->input->get("id");
		$course = $this->course_model->find($id)->result_array()[0];
		$data['course'] = $course;
		$this->load->view('dash/principal');
		$this->load->view('dash/menu');
		$this->load->view('dash/form-curso', $data);
		$this->load->view('dash/footer');
	}

	public function delete_course() {
		$id = $this->input->get("id");
		if ($this->course_model->delete($id)) {
			$this->list_course();
		}
	}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SIS extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_principal");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function principal(){
		if($this->session->userdata('is_logged_in')){
			$this->load->view('vw_principal');
		}
	}

	public function loginValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome','Login','required|trim|callback_validation_credentials');
		$this->form_validation->set_rules('password','Senha','required|md5|trim');

		if($this->form_validation->run()){
			$usuario=array(
				'nome'=>$this->input->post('nome'),
				'is_logged_in'=>1
			);
			$this->session->set_userdata($usuario);
			redirect('sis/principal');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function validate_credentials(){
		$this->load->model('model_users');

		if($this->model_users->can_log_in()){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials','Usuario/Senha Invalidos');
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
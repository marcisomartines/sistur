<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		//echo 'Foi chamado corretamente<br />';
		//$this->addStuff();
		$this->home();
	}
	public function hello(){
		echo "mais um teste";
	}

	public function home(){
		$data['title']="Meu titulo teste";
		$data['var1']='2';
		$data['var2']='8';

		$this->load->model("math");

		$data['addTotal']=$this->math->add($data['var1'],$data['var2']);
		$data['subTotal']=$this->math->sub($data['var2'],$data['var1']);

		$this->load->view("vw_home",$data);
	}

	public function addStuff(){
		$this->load->model("math");
		echo $this->math->add(2,2);
	}

	public function about(){
		$data['title']="About!";
		$this->load->view("vw_about",$data);
	}

	public function getValores(){
		$this->load->model("get_db");
		$data['results']=$this->get_db->getAll();
		$this->load->view("vw_db",$data);
	}

	function insereValores(){
		$this->load->model("get_db");

		$newRow=array(
			"nome" => "teste",
			"email" => "teste@gmail.com",
			"password" => "md5('senha')"
			);
		$this->get_db->insere1($newRow);

		echo "it has been added";
	}

	function updateValores(){
		$this->load->model("get_db");
		$linha=array(
			"nome"=>"mais um"
			);
		$this->get_db->update1($linha);
	}

	function calendario(){
		$pref = array(
			'show_next_prev' => TRUE,
			'start_day' => 'monday',
			'day_type' => 'short',//determina como nome do dia da semana sera escrito, abreviado ou por inteiro
			'month_type' =>'long'//determina como o nome do mes sera escrito
			);
		$this->load->library('calendar',$pref);
		$data = array(
			3 => 'http://exemplo.com.br/noticias/',
			7 => 'http://exemplo.com.br/noticias/',
			20 => 'http://exemplo.com.br/noticias/'
			);
		echo $this->calendar->generate($this->uri->segment(3),$this->uri->segment(4));
	}
}
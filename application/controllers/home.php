<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_principal");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function members(){
		if($this->session->userdata('is_logged_in')){//verificando se esta logado no sistema 
			$this->load->view('vw_principal');
		}
		else {
			redirect('home/restricted');
		}
	}

	public function restricted(){
		$this->load->view('vw_restricted');
	}

	public function loginValidation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Login','required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password','Senha', 'required|md5|trim');

		if($this->form_validation->run()){
			$usuario= array(
				'nome'=> $this->input->post('nome'),
				'is_logged_in' => 1
			);
			$this->session->set_userdata($usuario);
			redirect('home/members');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function validate_credentials(){
		$this->load->model('md_users');

		if($this->md_users->can_log_in()){
			return true;
		} else{
			$this->form_validation->set_message('validate_credentials','Usuario/Senha incorretos');
			return false;
		}
	}

	public function logout(){
		$this->session->sess_destroy();//destroi a sessão
		redirect('home/index');
	}

	public function signup(){
		$this->load->view('vw_signup');
	}

	public function pedidos(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_pedido");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function cadastroValidacaoMesa(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('mesa','Mesa','required|trim');
		$this->form_validation->set_rules('nrmesa','NrMesa','required|trim');
		$this->form_validation->set_rules('senha','Senha','required|trim');

		if($this->form_validation->run()){
			$this->load->model('model_users');
			$this->model_users->addMesa();
			$this->load->view('vw_mesa');
		}
		else{
			$this->load->view('vw_cadastroMesa');
		}
	}

	public function cadastroValidacaoPessoal(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required|trim');
		$this->form_validation->set_rules('usuario','Usuario','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_message('is_unique',"O endereco de email ja se encontra em uso.");
		$this->form_validation->set_rules('senha','Senha','required|trim');
		$this->form_validation->set_rules('telefone','Telefone','required|trim');
		$this->form_validation->set_rules('celular','Celular','required|trim');

		if($this->form_validation->run()){
			$this->load->model('md_users');
			$this->md_users->addPessoal();
			$this->load->view('vw_usuario');
		} else {
			$this->load->view('vw_usuarioCadastro');
		}
	}

	public function cadastroValidacaoCategoria(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Categoria','required|trim');

		if($this->form_validation->run()){
			$this->load->model('md_users');
			$this->md_users->addCategoria();
			$this->load->view('vw_categoria');
		} else{
			$this->load->view('vw_cadastroCategoria');
		}
	}

	public function cadastro(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_cadastro");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function usuario(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_usuario");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function usuarioCadastro(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view("vw_usuarioCadastro");
		}
		else{
			$this->load->view("vw_login");
		}
	}

	public function mesas(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_mesa');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function cadastroMesa(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_cadastroMesa');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function cliente(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_cliente');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function clienteCadastro(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_clienteCadastro');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function cadastroValidacaoCliente(){ 
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','nome','required|trim');
		$this->form_validation->set_rules('telefone','telefone','required|trim');

		if($this->form_validation->run()){
			$this->load->model('md_users');
			$this->md_users->addCliente();
			$this->load->view('vw_cliente');
		} else{
			$this->load->view('vw_clienteCadastro');
		}
	}

	public function categoria(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_categoria');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function cadastroCategoria(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_cadastroCategoria');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function view_upload(){
		$this->load->view('vw_upload',array('error'=>''));
	}

	public function upload(){
		$config['upload_path'] = "./img/";
		$config['allowed_types'] = "jpg|jpeg|png|gif";
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload()){
			$error=array('error' => $this->upload->display_errors());
			$this->load->view('vw_upload',$error);
		}else{
			$arquivo=$this->upload->data();
		}
	}

	public function reservarMesa(){//funcao para reservar uma mesa
		$this->load->model('model_users');
		$this->model_users->reservarMesa();
		$this->load->view('vw_mesa');
	}

	public function liberarMesa(){
		$this->load->model('model_users');
		$this->model_users->liberarMesa();
		$this->load->view('vw_mesa');
	}

	public function pagarConta(){
		$this->load->model('model_users');
		$this->model_users->pagarConta();
		$this->model_users->liberarMesa();
		$this->load->view('vw_members');
	}

	public function alterarMesa(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_editarMesa');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function alterarMesaValidacao(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('senha','Senha', 'required|md5|trim');

		if($this->form_validation->run()){
			$this->load->model('model_users');
			$this->model_users->editarMesa();
			$this->load->view('vw_mesa');
		} else{
			$this->load->view('vw_editarMesa');
		}
	}

	public function editarCategoria(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_editarCategoria');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function editarValidarProduto(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('produto','Produto','required|trim');
		$this->form_validation->set_rules('vlunitario','Valor','required|trim');
		$this->form_validation->set_rules('unmedida','Unidade','required|trim');
		$this->form_validation->set_rules('categoria','Categoria','required|trim');
		$this->form_validation->set_rules('descricao','Descricao','required|trim');

		if($this->form_validation->run()){
			$this->load->model('model_users');
			$this->model_users->editarProduto();
			$this->load->view('vw_produto');
		}
		else{
			$this->load->view('vw_editarProduto');
		}
	}

	public function editarValidarCategoria(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoria','Categoria', 'required|trim');

		if($this->form_validation->run()){
			$this->load->model('model_users');
			$this->model_users->editarCategoria();
			$this->load->view('vw_categoria');
		} else{
			$this->load->view('vw_editarCategoria');
		}
	}

	public function excluirCategoria(){
		if($this->session->userdata('is_logged_in')==1){
			$this->db->where('cd_categoria',$this->input->post('categoria'));
			if($this->db->delete('tb_categoria')){
				$this->db->view('vw_categoria');	
			}else {
				$this->db->view('vw_categoria');
			}
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function editarValidacaoUsuario(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required|trim');
		$this->form_validation->set_rules('usuario','Usuario','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_message('is_unique',"O endereco de email ja se encontra em uso.");
		$this->form_validation->set_rules('senha','Senha','required|trim');
		$this->form_validation->set_rules('telefone','Telefone','required|trim');
		$this->form_validation->set_rules('celular','Celular','required|trim');

		if($this->form_validation->run()){
			$this->load->model('md_users');
			$this->md_users->editarPessoal();
			$this->load->view('vw_usuario');
		} else {
			$this->load->view('vw_usuarioEditar');
		}
	}

	public function editarUsuario(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_usuarioEditar');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function excluirUsuario(){
		if($this->session->userdata('is_logged_in')==1){
			$this->db->where('id_users',$this->input->post('id_users'));
			$this->db->delete('tb_users');
			$this->load->view('vw_usuario');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function editarProduto(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->view('vw_editarProduto');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function excluirCliente(){
		if($this->session->userdata('is_logged_in')==1){
			$this->db->where('id_clients',$this->input->post('id_clients'));
			$this->db->delete('tb_clients');
			$this->load->view('vw_cliente');
		}
		else{
			$this->load->view('vw_login');
		}
	}

	public function receberPedido(){
		if($this->session->userdata('is_logged_in')==1){
			$this->load->model('model_users');
			$this->model_users->receberPedido();
			$this->load->view('vw_members');
		}
		else{
			$this->load->view('vw_login');
		}
	}
}
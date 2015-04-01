<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view("vw_principal");
        } else {
            $this->load->view("vw_login");
        }
    }

    public function members() {
        if ($this->session->userdata('is_logged_in')) {//verificando se esta logado no sistema 
            $this->load->view('vw_principal');
        } else {
            redirect('home/restricted');
        }
    }

    public function restricted() {
        $this->load->view('vw_restricted');
    }

    public function loginValidation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Login', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Senha', 'required|md5|trim');

        if ($this->form_validation->run()) {
            $usuario = array(
                'nome' => $this->input->post('nome'),
                'is_logged_in' => 1
            );
            $this->session->set_userdata($usuario);
            redirect('home/members');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function validate_credentials() {
        $this->load->model('md_users');

        if ($this->md_users->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Usuario/Senha incorretos');
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy(); //destroi a sessão
        redirect('home/index');
    }

    public function cadastroValidacaoPessoal() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_message('is_unique', "O endereco de email ja se encontra em uso.");
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addPessoal();
            $this->load->view('vw_usuario');
        } else {
            $this->load->view('vw_usuarioCadastro');
        }
    }

    public function usuario() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view("vw_usuario");
        } else {
            $this->load->view("vw_login");
        }
    }

    public function usuarioCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view("vw_usuarioCadastro");
        } else {
            $this->load->view("vw_login");
        }
    }

    public function motorista() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_motorista');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function motoristaCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_motoristaCadastro');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoMotorista() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'nome', 'required|trim');
        $this->form_validation->set_rules('telefone', 'telefone', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addMotorista();
            $this->load->view('vw_motorista');
        } else {
            $this->load->view('vw_motoristaCadastro');
        }
    }

    public function editarMotorista() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_motoristaEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarValidacaoMotorista() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'nome', 'required|trim');
        $this->form_validation->set_rules('telefone', 'telefone', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarMotorista();
            $this->load->view('vw_motorista');
        } else {
            $this->load->view('vw_motoristaEditar');
        }
    }

    public function detalharMotorista() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_motoristaDetalhar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function excluirMotorista() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_drivers', $this->input->post('id_drivers'));
            $this->db->delete('tb_drivers');
            $this->load->view('vw_motorista');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_cliente');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function clienteCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_clienteCadastro');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoCliente() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'nome', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addCliente();
            $this->load->view('vw_cliente');
        } else {
            $this->load->view('vw_clienteCadastro');
        }
    }
    
    public function cadastroValidacaoClienteJuridico() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome','nome','required|trim');
        
        if($this->form_validation->run()){
            $this->load->model('md_users');
            $this->md_users->addClienteJuridico();
            $this->load->view('vw_cliente');
        } else {
            $this->load->view('vw_cliente');
        }
    }

    public function editarValidacaoCliente() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'nome', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarCliente();
            $this->load->view('vw_cliente');
        } else {
            $this->load->view('vw_clienteEditar');
        }
    }
    
    public function editarValidacaoClienteJuridico(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome','nome','required|trim');
        
        if($this->form_validation->run()){
            $this->load->model('md_users');
            $this->md_users->editarClienteJuridico();
            $this->load->view('vw_cliente');
        }else{
            $this->load->view('vw_clienteEditar');
        }
    }

    public function orcamento(){
        if($this->session->userdata('is_logged_in')==1){
            $this->load->view('vw_orcamento');
        }else {
            $this->load->view('vw_login');
        }
    }
    
    public function orcamentoCadastro(){
        if($this->session->userdata('is_logged_in')==1){
            $this->load->view('vw_orcamentoCadastro');
        } else{
            $this->load->view('vw_login');
        }
    }
    
    public function cadastroValidacaoOrcamento(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('cliente','cliente','required|trim');
        $this->form_validation->set_rules('onibus','onibus','required|trim');
        $this->form_validation->set_rules('km_total','km_total','required|trim');
        
        if($this->form_validation->run()){
            $this->load->model('md_users');
            $this->md_users->addOrcamento();
            $this->load->view('vw_orcamento');
        }else{
            $this->load->view('vw_orcamentoCadastro');
        }
    }
    
    public function excluirOrcamento() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('status','A');
            $this->db->where('id_budget', $this->input->post('id_budget'));
            $this->db->delete('tb_budgets');
            $this->load->view('vw_orcamento');
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function onibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_onibus');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function onibusCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_onibusCadastro');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoOnibus() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'codigo', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addOnibus();
            $this->load->view('vw_onibus');
        } else {
            $this->load->view('vw_onibusCadastro');
        }
    }

    public function excluirOnibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_cars', $this->input->post('id_cars'));
            $this->db->delete('tb_cars');
            $this->load->view('vw_onibus');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function detalharOnibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_onibusDetalhar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarOnibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_onibusEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarValidacaoOnibus() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('codigo', 'codigo', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarOnibus();
            $this->load->view('vw_onibus');
        } else {
            $this->load->view('vw_onibusEditar');
        }
    }

    public function agenda() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_agenda');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function agendaCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_agendaCadastro');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function detalharAgenda() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_agendaDetalhar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoAgenda() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_car', 'id_car', 'required|trim'); //onibus
        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim'); //tipo de agendamento

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addAgenda();
            $this->load->view('vw_agenda');
        } else {
            $this->load->view('vw_agendaCadastro');
        }
    }

    public function editarAgenda() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_agendaEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarValidacaoAgenda() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_car', 'id_car', 'required|trim'); //onibus
        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim'); //tipo de agendamento

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarAgenda();
            $this->load->view('vw_agenda');
        } else {
            $this->load->view('vw_agendaEditar');
        }
    }

    public function excluirAgenda() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_tour', $this->input->post('id_tour'));
            $this->db->delete('tb_tour');
            $this->load->view('vw_agenda');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarValidacaoUsuario() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_message('is_unique', "O endereco de email ja se encontra em uso.");
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarPessoal();
            $this->load->view('vw_usuario');
        } else {
            $this->load->view('vw_usuarioEditar');
        }
    }

    public function editarUsuario() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_usuarioEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function excluirUsuario() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_users', $this->input->post('id_users'));
            $this->db->delete('tb_users');
            $this->load->view('vw_usuario');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_clienteEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function excluirCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_clients', $this->input->post('id_clients'));
            $this->db->delete('tb_clients');
            $this->load->view('vw_cliente');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function detalharCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_clienteDetalhar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function reserva() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_reserva');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function reservaMapa() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_tour', 'id_tour', 'required|trim'); //cliente

            if ($this->form_validation->run()) {
                $this->load->view('vw_reservaMapa');
            } else {
                $this->load->view('vw_reserva');
            }
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function guiaMapa(){
        if($this->session->userdata('is_logged_in')==1){
            $this->load->view('vw_guiaMapa');
        }else{
            $this->load->view('vw_login');
        }
    }
    public function editarReserva() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_reservaEditar');
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function guiaInfo(){
        if($this->session->userdata('is_logged_in')==1){
            $this->load->view('vw_guiaInfo');
        }else{
            $this->load->view('vw_login');
        }
    }

    public function fechamentoReserva() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_reservaFechamento');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoReserva() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('course', 'cliente', 'required|trim'); //cliente
        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim'); //tipo de agendamento
        $this->form_validation->set_rules('nr_poltrona','Nr. Poltrona','required|trim');//verifica se tem a poltrona

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addReserva();
            $this->load->view('vw_reservaMapa');
        } else {
            $this->load->view('vw_reservaMapa');
        }
    }
    
    public function cadastroValidacaoClienteReserva() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'nome', 'required|trim');//cliente
        $this->form_validation->set_rules('tipo', 'tipo', 'required|trim'); //tipo de agendamento
        $this->form_validation->set_rules('nr_poltrona','Nr. Poltrona','required|trim');//verifica se tem a poltrona

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addClienteReserva();
            $this->load->view('vw_reservaMapa');
        } else {
            $this->load->view('vw_reservaMapa');
        }
    }

    public function editarValidacaoReserva() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->model('md_users');
            $this->md_users->editarReserva();
            //$this->load->view('vw_reserva');
            $this->load->view('vw_reservaMapa');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function excluirReserva() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_reservs', $this->input->post('id_reservs'));
            $this->db->delete('tb_reservs');
            $this->load->view('vw_reservaMapa');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoGastosViagem() {
        $this->load->model('md_users');
        $this->md_users->upViagem();
        $this->load->view('vw_reserva');
    }

    public function viagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_viagem');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function viagemCadastro() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_viagemCadastro');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function editarViagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_viagemEditar');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function cadastroValidacaoViagem() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('destino', 'destino', 'required|trim'); //cliente

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->addViagem();
            $this->load->view('vw_viagem');
        } else {
            $this->load->view('vw_viagemCadastro');
        }
    }

    public function editarValidacaoViagem() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('destino', 'destino', 'required|trim');

        if ($this->form_validation->run()) {
            $this->load->model('md_users');
            $this->md_users->editarViagem();
            $this->load->view('vw_viagem');
        } else {
            $this->load->view('vw_viagemEditar');
        }
    }

    public function excluirViagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->db->where('id_viagem', $this->input->post('id_viagem'));
            $this->db->delete('tb_viagem');
            $this->load->view('vw_viagem');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioPassagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_relatorioPassagem');
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function relatorioListaPassagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaRelatorioPassagem');
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function relatorioCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_relatorioCliente');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioListaCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaRelatorioCliente');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioViagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_relatorioViagem');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioListaViagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaRelatorioViagem');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioOnibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_relatorioOnibus');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function relatorioListaOnibus() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaRelatorioOnibus');
        } else {
            $this->load->view('vw_login');
        }
    }
    
    public function guiaLista(){
        if($this->session->userdata('is_logged_in') == 1){
            $this->load->view('vw_guiaLista');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function listaPassageiros() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaPassageiros');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function gerarRelatorioViagem() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_gerarRelatorioViagem');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function gerarRelatorioCliente() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_gerarRelatorioCliente');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function aniversariantes() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_aniversariantes');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function listaAniversariantes() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_listaRelatorioAniversariantes');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function gerarRelatorioAniversariantes() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_gerarRelatorioAniversariantes');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function teste() {
        $this->load->view('teste');
    }

    public function autoComplete() {
        $this->load->view('autoComplete');
    }

    public function relatorio() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_relatorio');
        } else {
            $this->load->view('vw_login');
        }
    }

    public function email() {
        if ($this->session->userdata('is_logged_in') == 1) {
            $this->load->view('vw_email');
        } else {
            $this->load->view('vw_login');
        }
    }

}

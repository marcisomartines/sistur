<?php

class Md_users extends CI_Model{
	public function can_log_in(){
		$this->db->where('nome_user',$this->input->post('nome'));
		$this->db->where('senha',md5($this->input->post('password')));
		$query=$this->db->get('tb_users');
		if($query->num_rows()==1){
			return true;
		}
		else{
			return false;
		}
	}

	public function addPessoal(){
		$data = array(
			'nome_comp' => $this->input->post('nome'),
			'nome_user' => $this->input->post('usuario'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'telefone' => $this->input->post('telefone'),
			'celular' => $this->input->post('celular'),
			'status' => 'A'
			);
		$this->db->insert('tb_users',$data);
	}


	public function addCliente(){
		$data = array('nome' 	=> $this->input->post('nome'),
			'data_nascimento' 	=> $this->input->post('data_nascimento'),
			'rg' 				=> $this->input->post('rg'),
			'cpf' 				=> $this->input->post('cpf'),
			'email' 			=> $this->input->post('email'),
			'telefone' 			=> $this->input->post('telefone'),
			'celular' 			=> $this->input->post('celular'),
			'rua' 				=> $this->input->post('rua'),
			'bairro' 			=> $this->input->post('bairro'),
			'cidade' 			=> $this->input->post('cidade'),
			'loc_embarque' 		=> $this->input->post('loc_embarque'),
			'observacao' 		=> $this->input->post('observacao')
			);
		$this->db->insert('tb_clients',$data);
	}

	public function addMotorista(){
		$data = array('nome' 	=> $this->input->post('nome'),
			'data_nascimento' 	=> $this->input->post('data_nascimento'),
			'rg' 				=> $this->input->post('rg'),
			'cpf' 				=> $this->input->post('cpf'),
			'email' 			=> $this->input->post('email'),
			'telefone' 			=> $this->input->post('telefone'),
			'celular' 			=> $this->input->post('celular'),
			'rua' 				=> $this->input->post('rua'),
			'bairro' 			=> $this->input->post('bairro'),
			'cidade' 			=> $this->input->post('cidade'),
			'cnh' 				=> $this->input->post('cnh'),
			'observacao' 		=> $this->input->post('observacao'),
			'status'			=> 'A'
			);
		$this->db->insert('tb_drivers',$data);
	}

	public function addOnibus(){
		$data = array('montadora' 	=> $this->input->post('montadora'),
			'modelo' 				=> $this->input->post('modelo'),
			'chassis' 				=> $this->input->post('chassis'),
			'placa' 				=> $this->input->post('placa'),
			'codigo' 				=> $this->input->post('codigo'),
			'ano' 					=> $this->input->post('ano'),
			'nr_poltrona' 			=> $this->input->post('nr_poltrona'),
			'status'				=> 'A',
			'observacao' 			=> $this->input->post('observacao')
			);
		$this->db->insert('tb_cars',$data);
	}

	public function editarMotorista(){
		$data = array('nome' 	=> $this->input->post('nome'),
			'data_nascimento' 	=> $this->input->post('data_nascimento'),
			'rg' 				=> $this->input->post('rg'),
			'cpf' 				=> $this->input->post('cpf'),
			'email' 			=> $this->input->post('email'),
			'telefone' 			=> $this->input->post('telefone'),
			'celular' 			=> $this->input->post('celular'),
			'rua' 				=> $this->input->post('rua'),
			'bairro' 			=> $this->input->post('bairro'),
			'cidade' 			=> $this->input->post('cidade'),
			'cnh' 				=> $this->input->post('cnh'),
			'observacao' 		=> $this->input->post('observacao'),
			'status'			=> $this->input->post('status')
			);
		$this->db->where('id_drivers',$this->input->post('id_drivers'));
		$this->db->update('tb_drivers',$data);
	}

	public function editarOnibus(){
		$data = array('montadora' 	=> $this->input->post('montadora'),
			'modelo' 				=> $this->input->post('modelo'),
			'chassis' 				=> $this->input->post('chassis'),
			'placa' 				=> $this->input->post('placa'),
			'codigo' 				=> $this->input->post('codigo'),
			'ano' 					=> $this->input->post('ano'),
			'nr_poltrona' 			=> $this->input->post('nr_poltrona'),
			'status'				=> $this->input->post('status'),
			'observacao' 			=> $this->input->post('observacao')
			);
		$this->db->where('id_cars',$this->input->post('id_cars'));
		$this->db->update('tb_cars',$data);
	}

	public function editarCliente(){
		$data = array('nome' 	=> $this->input->post('nome'),
			'data_nascimento' 	=> $this->input->post('data_nascimento'),
			'rg' 				=> $this->input->post('rg'),
			'cpf' 				=> $this->input->post('cpf'),
			'email' 			=> $this->input->post('email'),
			'telefone' 			=> $this->input->post('telefone'),
			'celular' 			=> $this->input->post('celular'),
			'rua' 				=> $this->input->post('rua'),
			'bairro' 			=> $this->input->post('bairro'),
			'cidade' 			=> $this->input->post('cidade'),
			'loc_embarque' 		=> $this->input->post('loc_embarque'),
			'observacao' 		=> $this->input->post('observacao')
			);
		$this->db->where('id_clients',$this->input->post('id_clients'));
		$this->db->update('tb_clients',$data);
	}

	public function editarPessoal(){
		$data = array(
			'nome_comp' => $this->input->post('nome'),
			'nome_user' => $this->input->post('usuario'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'telefone' => $this->input->post('telefone'),
			'celular' => $this->input->post('celular'),
			'status' => $this->input->post('status')
			);
		$this->db->where('id_users',$this->input->post('id_users'));
		$this->db->update('tb_users',$data);
	}
	public function editarMesa(){
		$data = array ('tx_mesa' => $this->input->post('mesa'),
						'nr_mesa'=> $this->input->post('nrmesa'),
						'pw_senha_mesa' => $this->input->post('senha'));
		$this->db->where('cd_mesa',$this->input->post('cd_mesa'));
		$this->db->update('tb_mesa',$data);
	}

	public function editarCategoria(){
		$data = array ('ds_categoria' => $this->input->post('nome'));
		$this->db->where('cd_categoria',$this->input->post('categoria'));
		$this->db->update('tb_categoria',$data);
	}

	public function receberPedido(){
		$data = array ('bo_confirmado' => 'V');
		$this->db->where('cd_consumo',$this->input->post('cd_consumo'));
		//$this->db->where('st_situacao','A');
		$this->db->update('tb_mesa_consumo',$data);
	}
}
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

	public function addCategoria(){
		$data = array('ds_categoria' => $this->input->post('nome'),
			'bo_ativo' => 't' 
			);
		$this->db->insert('tb_categoria',$data);
	}

	public function reservarMesa(){
		$data = array('cd_status_mesa' => 3);
		$this->db->where('cd_mesa',$this->input->post('cd_mesa'));
		$this->db->update('tb_mesa',$data);
	}

	public function liberarMesa(){
		$data = array('cd_status_mesa' => 1);
		$this->db->where('cd_mesa',$this->input->post('cd_mesa'));
		$this->db->update('tb_mesa',$data);
	}

	public function pagarConta(){
		$date=date("Y/m/d h:i:s");
		$data = array('st_situacao' => 'P',
					  'ts_fechamento' => $date);
		$this->db->where('cd_mesa',$this->input->post('mesa'));
		$this->db->where('st_situacao','F');
		$this->db->update('tb_mesa_consumo',$data);
		$total = array('cd_mesa' => $this->input->post('mesa'),
						'ts_fechamento' => $date,
						'vl_total' => $this->input->post('vl_total'));
		$this->db->insert('tb_mesa_consumo_total',$total);
	}

	public function editarPessoal(){
		$data = array(
			'nome_comp' => $this->input->post('nome'),
			'nome_user' => $this->input->post('usuario'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'telefone' => $this->input->post('telefone'),
			'celular' => $this->input->post('celular')
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

	public function editarProduto(){
		$data = array('cd_gtin' => $this->input->post('codbarra'),
			'ds_produto' => $this->input->post('produto'),
			'vl_unitario' => $this->input->post('vlunitario'),
			'cd_unidade_medida' => $this->input->post('unmedida'),
			'ds_composicao' => $this->input->post('descricao'),
			'in_producao_propria' => $this->input->post('prodpropria')
			);
		$this->db->where('cd_produto',$this->input->post('cd_produto'));
		$this->db->update('tb_produtos_servicos',$data);
	}

	public function receberPedido(){
		$data = array ('bo_confirmado' => 'V');
		$this->db->where('cd_consumo',$this->input->post('cd_consumo'));
		//$this->db->where('st_situacao','A');
		$this->db->update('tb_mesa_consumo',$data);
	}
}
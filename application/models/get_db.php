<?php
class Get_db extends CI_Model{
	function getAll(){
		$query=$this->db->query("SELECT * FROM tb_usuario;");
		return $query->result();//retorna similar ao mysql_fetch_assoc
	}

	function insere1($var){//
		$this->db->insert("tb_usuario",$var);
//para inserir mais de uma linha de uma vez usa $this->db->insert_batch()
//passando como argumento um array de multiplas dimensões		
	}

	function update1($var){
		$this->db->update("tb_usuario",$var,"id = 2");
	}
}
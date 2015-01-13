<?php

class Md_users extends CI_Model {

    public function can_log_in() {
        $this->db->where('nome_user', $this->input->post('nome'));
        $this->db->where('senha', md5($this->input->post('password')));
        $query = $this->db->get('tb_users');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addPessoal() {
        $data = array(
            'nome_comp'     => $this->input->post('nome'),
            'nome_user'     => $this->input->post('usuario'),
            'email'         => $this->input->post('email'),
            'senha'         => md5($this->input->post('senha')),
            'telefone'      => $this->input->post('telefone'),
            'celular'       => $this->input->post('celular'),
            'tipo'          => $this->input->post('tipo'),
            'status'        => 'A',
            'empresa'       => 'Seriema Turismo',
            'titulo'        => 'SISTUR - Sistema de Turismo e Reserva de Passagem'
        );
        $this->db->insert('tb_users', $data);
    }

    public function addCliente() {
        $data_nascimento = implode("-", array_reverse(explode("/", $this->input->post($this->input->post('data_nascimento')))));
        $data = array('nome'    => strtoupper($this->input->post('nome')),
            'data_nascimento'   => $data_nascimento,
            'rg'                => $this->input->post('rg'),
            'cpf'               => $this->input->post('cpf'),
            'email'             => $this->input->post('email'),
            'telefone'          => $this->input->post('telefone'),
            'celular'           => $this->input->post('celular'),
            'rua'               => $this->input->post('rua'),
            'bairro'            => $this->input->post('bairro'),
            'cidade'            => $this->input->post('cidade'),
            'loc_embarque'      => $this->input->post('loc_embarque'),
            'tipo_cliente'      => 0,
            'observacao'        => $this->input->post('observacao')
        );
        $this->db->insert('tb_clients', $data);
    }
    
    public function addClienteJuridico(){
        $data = array('nome'    =>$this->input->post('nome'),
            'responsavel'       =>$this->input->post('responsavel'),
            'cnpj'              =>$this->input->post('cnpj'),
            'email'             =>$this->input->post('email'),
            'telefone'          =>$this->input->post('telefonej'),
            'celular'           =>$this->input->post('celularj'),
            'rua'               =>$this->input->post('rua'),
            'bairro'            =>$this->input->post('bairro'),
            'cidade'            =>$this->input->post('cidade'),
            'contato1'          =>$this->input->post('contato1'),
            'cont_tel1'         =>$this->input->post('cont_tel1'),
            'cont_email1'       =>$this->input->post('cont_email1'),
            'contato2'          =>$this->input->post('contato2'),
            'cont_tel2'         =>$this->input->post('cont_tel2'),
            'cont_email2'       =>$this->input->post('cont_email2'),
            'contato3'          =>$this->input->post('contato3'),
            'cont_tel3'         =>$this->input->post('cont_tel3'),
            'cont_email3'       =>$this->input->post('cont_email3'),
            'tipo_cliente'      =>1
        );
        $this->db->insert('tb_clients',$data);
    }

    public function addMotorista() {
        $data_nascimento = implode("-", array_reverse(explode("/", $this->input->post('data_nascimento'))));
        $validade_cnh = implode("-", array_reverse(explode("/", $this->input->post('validade_cnh'))));
        $data = array('nome'    => $this->input->post('nome'),
            'data_nascimento'   => $data_nascimento,
            'rg'                => $this->input->post('rg'),
            'cpf'               => $this->input->post('cpf'),
            'email'             => $this->input->post('email'),
            'telefone'          => $this->input->post('telefone'),
            'celular'           => $this->input->post('celular'),
            'rua'               => $this->input->post('rua'),
            'bairro'            => $this->input->post('bairro'),
            'cidade'            => $this->input->post('cidade'),
            'cnh'               => $this->input->post('cnh'),
            'validade_cnh'      => $validade_cnh,
            'observacao'        => $this->input->post('observacao'),
            'status'            => 'A'
        );
        $this->db->insert('tb_drivers', $data);
    }

    public function addOnibus() {
        $antt = implode("-", array_reverse(explode("/", $this->input->post('antt'))));
        $agepan = implode("-", array_reverse(explode("/", $this->input->post('agepan'))));
        $vistec = implode("-", array_reverse(explode("/", $this->input->post('vistec'))));
        $inmetro = implode("-", array_reverse(explode("/", $this->input->post('inmetro'))));
        $seguro_inicio = implode("-", array_reverse(explode("/", $this->input->post('seguro_inicio'))));
        $seguro_final = implode("-", array_reverse(explode("/", $this->input->post('seguro_final'))));
        $data = array('montadora' => $this->input->post('montadora'),
            'modelo' => $this->input->post('modelo'),
            'chassis' => $this->input->post('chassis'),
            'placa' => $this->input->post('placa'),
            'codigo' => $this->input->post('codigo'),
            'ano' => $this->input->post('ano'),
            'nr_poltrona' => $this->input->post('nr_poltrona'),
            'status' => 'A',
            'antt' => $antt,
            'agepan' => $agepan,
            'vistec' => $vistec,
            'inmetro' => $inmetro,
            'seguro_inicio' => $seguro_inicio,
            'seguro_final' => $seguro_final,
            'valorkm' => $this->input->post('valorkm'),
            'observacao' => $this->input->post('observacao')
        );
        $this->db->insert('tb_cars', $data);
    }

    public function addAgenda() {
        $data_saida = implode("-", array_reverse(explode("/", $this->input->post('data_saida'))));
        $data_retorno = implode("-", array_reverse(explode("/", $this->input->post('data_retorno'))));
        $preco = str_replace(',', '.', $this->input->post('preco'));
        $preco_un = str_replace(',', '.', $this->input->post('preco_un'));
        $data = array('id_client' => $this->input->post('id_client'),
            'id_car' => $this->input->post('id_car'),
            'id_user' => $this->input->post('id_user'),
            'id_viagem' => $this->input->post('id_viagem'),
            'data_saida' => $data_saida,
            'data_retorno' => $data_retorno,
            'id_motorista' => $this->input->post('id_motorista'),
            'preco' => $preco,
            'preco_un' => $preco_un,
            'tipo' => $this->input->post('tipo'),
            'observacao' => $this->input->post('observacao'),
            'status' => 'A'
        );
        $this->db->insert('tb_tour', $data);
    }
    
    public function addOrcamento(){
        
    }

    public function editarAgenda() {
        $data_saida = implode("-", array_reverse(explode("/", $this->input->post('data_saida'))));
        $data_retorno = implode("-", array_reverse(explode("/", $this->input->post('data_retorno'))));
        $preco = $this->input->post('preco');
        $preco = str_replace(',', '.', $preco);
        $preco_un = $this->input->post('preco_un');
        $preco_un = str_replace(',', '.', $preco_un);
        $data = array('id_client' => $this->input->post('id_client'),
            'id_car' => $this->input->post('id_car'),
            'id_user' => $this->input->post('id_user'),
            'id_viagem' => $this->input->post('id_viagem'),
            'data_saida' => $data_saida,
            'data_retorno' => $data_retorno,
            'id_motorista' => $this->input->post('id_motorista'),
            'preco' => $preco,
            'preco_un' => $preco_un,
            'tipo' => $this->input->post('tipo'),
            'observacao' => $this->input->post('observacao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->update('tb_tour', $data);
    }

    public function editarMotorista() {
        $data_nascimento = implode("-", array_reverse(explode("/", $this->input->post('data_nascimento'))));
        $validade_cnh = implode("-", array_reverse(explode("/", $this->input->post('validade_cnh'))));
        $data = array('nome' => $this->input->post('nome'),
            'data_nascimento' => $data_nascimento,
            'rg' => $this->input->post('rg'),
            'cpf' => $this->input->post('cpf'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone'),
            'celular' => $this->input->post('celular'),
            'rua' => $this->input->post('rua'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'cnh' => $this->input->post('cnh'),
            'validade_cnh' => $validade_cnh,
            'observacao' => $this->input->post('observacao'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id_drivers', $this->input->post('id_drivers'));
        $this->db->update('tb_drivers', $data);
    }

    public function editarOnibus() {
        $antt = implode("-", array_reverse(explode("/", $this->input->post('antt'))));
        $agepan = implode("-", array_reverse(explode("/", $this->input->post('agepan'))));
        $vistec = implode("-", array_reverse(explode("/", $this->input->post('vistec'))));
        $inmetro = implode("-", array_reverse(explode("/", $this->input->post('inmetro'))));
        $seguro_inicio = implode("-", array_reverse(explode("/", $this->input->post('seguro_inicio'))));
        $seguro_final = implode("-", array_reverse(explode("/", $this->input->post('seguro_final'))));
        $data = array('montadora' => $this->input->post('montadora'),
            'modelo' => $this->input->post('modelo'),
            'chassis' => $this->input->post('chassis'),
            'placa' => $this->input->post('placa'),
            'codigo' => $this->input->post('codigo'),
            'ano' => $this->input->post('ano'),
            'nr_poltrona' => $this->input->post('nr_poltrona'),
            'status' => $this->input->post('status'),
            'antt' => $antt,
            'agepan' => $agepan,
            'vistec' => $vistec,
            'inmetro' => $inmetro,
            'seguro_inicio' => $seguro_inicio,
            'seguro_final' => $seguro_final,
            'valorkm' => $this->input->post('valorkm'),
            'observacao' => $this->input->post('observacao')
        );
        $this->db->where('id_cars', $this->input->post('id_cars'));
        $this->db->update('tb_cars', $data);
    }

    public function editarCliente() {
        $data_nascimento = implode("-", array_reverse(explode("/", $this->input->post('data_nascimento'))));
        $data = array('nome' => $this->input->post('nome'),
            'data_nascimento' => $data_nascimento,
            'rg' => $this->input->post('rg'),
            'cpf' => $this->input->post('cpf'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone'),
            'celular' => $this->input->post('celular'),
            'rua' => $this->input->post('rua'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'loc_embarque' => $this->input->post('loc_embarque'),
            'observacao' => $this->input->post('observacao')
        );
        $this->db->where('id_clients', $this->input->post('id_clients'));
        $this->db->update('tb_clients', $data);
    }
    
    public function editarClienteJuridico(){
        $data = array('nome'    =>$this->input->post('nome'),
            'responsavel'       =>$this->input->post('responsavel'),
            'cnpj'              =>$this->input->post('cnpj'),
            'email'             =>$this->input->post('email'),
            'telefone'          =>$this->input->post('telefonej'),
            'celular'           =>$this->input->post('celularj'),
            'rua'               =>$this->input->post('rua'),
            'bairro'            =>$this->input->post('bairro'),
            'cidade'            =>$this->input->post('cidade'),
            'contato1'          =>$this->input->post('contato1'),
            'cont_tel1'         =>$this->input->post('cont_tel1'),
            'cont_email1'       =>$this->input->post('cont_email1'),
            'contato2'          =>$this->input->post('contato2'),
            'cont_tel2'         =>$this->input->post('cont_tel2'),
            'cont_email2'       =>$this->input->post('cont_email2'),
            'contato3'          =>$this->input->post('contato3'),
            'cont_tel3'         =>$this->input->post('cont_tel3'),
            'cont_email3'       =>$this->input->post('cont_email3'),
        );
        $this->db->where('id_clients',$this->input->post('id_clients'));
        $this->db->update('tb_clients',$data);
    }

    public function editarPessoal() {
        $data = array(
            'nome_comp' => $this->input->post('nome'),
            'nome_user' => $this->input->post('usuario'),
            'email' => $this->input->post('email'),
            'senha' => md5($this->input->post('senha')),
            'telefone' => $this->input->post('telefone'),
            'celular' => $this->input->post('celular'),
            'tipo' => $this->input->post('tipo'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id_users', $this->input->post('id_users'));
        $this->db->update('tb_users', $data);
    }

    public function addReserva() {
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->where('tipo', $this->input->post('tipo'));
        $this->db->where('nr_poltrona', $this->input->post('nr_poltrona'));
        $val = $this->db->get('tb_reservs');
        if ($val->num_rows() == 0) {
            $query = $this->db->query("SELECT * FROM tb_clients WHERE nome='" . $this->input->post('course') . "'");
            foreach ($query->result() as $e) {
                $cliente = $e;
            }
            $data = array('nr_poltrona' => $this->input->post('nr_poltrona'),
                            'tipo'          => $this->input->post('tipo'),
                            'id_tour'       => $this->input->post('id_tour'), //onibus
                            'id_client'     => $cliente->id_clients,
                            //'id_movfinan'          => $this->input->post('id_motorista'),
                            'loc_embarque'  => $this->input->post('loc_embarque'),
                            'desconto'      => $this->input->post('desconto'),
                            'ultima_viagem' => $this->input->post('ultima_viagem'),
                            'destino_ultv'  => $this->input->post('destino_ultv'),
                            'dt_reserva'    =>date('Y-m-d H:i:s')
            );
            $this->db->insert('tb_reservs', $data);
            $sel=$this->db->query("SELECT * FROM tb_tour WHERE id_tour='" . $this->input->post('id_tour') . "'");
            foreach ($sel->result() as $e) {
                $date = $e;
            }
            $data2=array('ult_viagem'=>$date->data_saida);
            $this->db->where('id_clients',$cliente->id_clients);
            $this->db->update('tb_clients',$data2);
        }
    }
    
    public function addClienteReserva() {
        //inserir o cliente
        $data_nascimento = implode("-", array_reverse(explode("/", $this->input->post($this->input->post('data_nascimento')))));
        $data = array('nome' => $this->input->post('nome'),
            'data_nascimento' => $data_nascimento,
            'rg' => $this->input->post('rg'),
            'cpf' => $this->input->post('cpf'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone'),
            'celular' => $this->input->post('celular'),
            'rua' => $this->input->post('rua'),
            'bairro' => $this->input->post('bairro'),
            'cidade' => $this->input->post('cidade'),
            'loc_embarque' => $this->input->post('loc_embarque'),
            'observacao' => $this->input->post('observacao')
        );
        $this->db->insert('tb_clients', $data);
        //procurar o ultimo valor de
        //realiza a reserva da passagem
        $resultadoCliente=$this->db->query("SELECT MAX(id_clients) as id_clients FROM tb_clients");
        foreach ($resultadoCliente->result() as $e) {
            $cliente = $e;
        }
        $data = array('nr_poltrona' => $this->input->post('nr_poltrona'),
            'tipo' => $this->input->post('tipo'),
            'id_tour' => $this->input->post('id_tour'), //onibus
            'id_client' => $cliente->id_clients,
            'desconto' => $this->input->post('desconto'),
            'ultima_viagem' => $this->input->post('ultima_viagem'),
            'destino_ultv' => $this->input->post('destino_ultv')
        );
        $this->db->insert('tb_reservs', $data);
        $sel = $this->db->query("SELECT * FROM tb_tour WHERE id_tour='" . $this->input->post('id_tour') . "'");
        foreach ($sel->result() as $e) {
            $date = $e;
        }
        $data2 = array('ult_viagem' => $date->data_saida);
        $this->db->where('id_clients', $cliente->id_clients);
        $this->db->update('tb_clients', $data2);
    }

    public function editarReserva() {
//        $this->db->where('nr_poltrona', $this->input->post('nr_poltrona'));
//        $this->db->where('id_tour', $this->input->post('id_tour'));
//        $val = $this->db->get('tb_reservs');
//        if ($val->num_rows() == 0) {
            $data = array('id_client' => $this->input->post('cliente'),
                'tipo' => $this->input->post('tipo'),
                'desconto' => $this->input->post('desconto'),
                'loc_embarque' => $this->input->post('loc_embarque'),
                'nr_poltrona' => $this->input->post('nr_poltrona')
            );
            $this->db->where('id_reservs', $this->input->post('id_reservs'));
            $this->db->update('tb_reservs', $data);
        }
//    }

    public function upViagem() {
        $alimentacao = str_replace(',', '.', $this->input->post('alimentacao'));
        $combustivel = str_replace(',', '.', $this->input->post('combustivel'));
        ;
        $outros = str_replace(',', '.', $this->input->post('outros'));
        ;
        $total = str_replace(',', '.', $this->input->post('total'));
        ;
        $data = array('alimentacao' => $alimentacao,
            'combustivel' => $combustivel,
            'outros' => $outros,
            'total' => $total,
            'status' => 'F'
        );
        $this->db->where('id_tour', $this->input->post('id_tour'));
        $this->db->update('tb_tour', $data);
    }

    public function addViagem() {
        $data = array(
            'destino' => $this->input->post('destino')
        );
        $this->db->insert('tb_viagem', $data);
    }

    public function editarViagem() {
        $data = array(
            'destino' => $this->input->post('destino')
        );
        $this->db->where('id_viagem', $this->input->post('id_viagem'));
        $this->db->update('tb_viagem', $data);
    }

}

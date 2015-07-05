<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if (!isset($id_tour)) {
    $id_tour = $this->input->post('id_tour');
}
if (!isset($nr_poltrona)) {
    $nr_poltrona = $this->input->post('nr_poltrona');
}
if (!isset($id_reservs)) {
    $id_reservs = $this->input->post('id_reservs');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title><?= $query[0]->titulo ?></title>
        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    </head>
    <body>
        <script>
            function valorPago(){
                var valor_pago = document.getElementById("valor_pago");
                var valorpg = document.getElementById("valorpg");
                valorpg.value = valor_pago.value;
            }
        </script>
        <div id="wrapper">

            <!-- barra lateral -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><?= $query[0]->empresa ?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <?php
                    if ($query[0]->tipo > 0) {
                        ?>
                        <ul class="nav navbar-nav side-nav">
                            <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul class="nav navbar-nav side-nav">
                            <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
<!--                            <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>-->
                            <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                            <li class="active"><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"><i class="fa fa-bus"></i> Guia</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                            <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                    <!-- Menu superior alinhado a direita-->
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $query[0]->nome_user ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><?= form_open('home/editarUsuario') ?>
                                    <input type="hidden" name="id_users" value="<?= $query[0]->id_users ?>" />
                                    <button type="submit" class="btn btn-link"><i class="fa fa-gear"></i> Configurações</button>
                                    </form></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() . "index.php/home/logout" ?>"><i class="fa fa-power-off"></i> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            <!--fim do menu superior alinhado a direita-->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Informações <small>passagem</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"> Guia</a> / Informações</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div>
                    <h1>Informações passageiro</h1>
                    <?php
                    $this->db->select('tb_reservs.id_reservs,
                                        tb_reservs.valor_pago,
                                        tb_reservs.nr_poltrona,
                                        tb_reservs.tipo,
                                        tb_reservs.id_tour,
                                        tb_reservs.id_client,
                                        tb_reservs.loc_embarque as embarquer,
                                        tb_clients.loc_embarque as embarquec,
                                        tb_reservs.desconto,
                                        tb_clients.id_clients,
                                        tb_clients.nome,
                                        tb_clients.email,
                                        tb_clients.rg,
                                        tb_clients.cpf,
                                        tb_clients.telefone,
                                        tb_clients.celular, 
                                        tb_tour.preco,
                                        tb_tour.preco_un');
                    $this->db->from('tb_reservs');
                    $this->db->join('tb_clients', 'tb_clients.id_clients=tb_reservs.id_client');
                    $this->db->join('tb_tour','tb_tour.id_tour=tb_reservs.id_tour');
                    $this->db->where('tb_reservs.id_tour', $id_tour);
                    $this->db->where('tb_reservs.nr_poltrona', $nr_poltrona);
                    $this->db->where('tb_reservs.id_reservs', $id_reservs);
                    $query = $this->db->get();

                    foreach ($query->result() as $row) {
                        $reservaDados = $row;
                    }
                    echo form_open('home/atualizarDados');
                    ?>
                        <div class="row">
                            <div class="col-md-2">
                                <?php
                                echo form_hidden('id_clients',$reservaDados->id_clients);
                                echo form_hidden('id_tour',$id_tour);
                                echo form_hidden('nr_poltrona',$nr_poltrona);
                                echo form_hidden('id_reservs',$id_reservs);
                                echo form_label("Poltrona:");
                                echo form_input(array(
                                    'name'      => 'nr_poltrona',
                                    'id'        => 'nr_poltrona',
                                    'class'     => 'form-control',
                                    'value'     => $nr_poltrona,
                                    'readonly'  => 'true'
                                ));
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo form_label("Nome:");
                                echo form_input(array(
                                    'name'=>'nome',
                                    'id'=>'nome',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->nome,
                                    'readonly'=>'true'
                                ));
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                echo form_label("RG:");
                                echo form_input(array(
                                    'name'=>'rg',
                                    'id'=>'rg',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->rg
                                ));
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                echo form_label("CPF:");
                                echo form_input(array(
                                    'name'=>'cpf',
                                    'id'=>'cpf',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->cpf
                                ));
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                echo form_label("Telefone:");
                                echo form_input(array(
                                    'name'=>'telefone',
                                    'id'=>'telefone',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->telefone
                                ));
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                echo form_label("Celular:");
                                echo form_input(array(
                                    'name'=>'celular',
                                    'id'=>'celular',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->celular
                                ));
                                
                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <?php
                                echo form_label("E-mail:");
                                echo form_input(array(
                                    'name'=>'email',
                                    'id'=>'email',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->email
                                ));
                                ?>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-md-8">
                                <?php
                                echo form_label("Local de Embarque:");
                                echo form_input(array(
                                    'name'=>'embarque',
                                    'id'=>'embarque',
                                    'class'=>'form-control',
                                    'value'=>$reservaDados->embarquec
                                ));
                                ?>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            if(empty($reservaDados->valor_pago)){
                                if($reservaDados->tipo=='d'){
                                    $valor=$reservaDados->preco;
                                }else{
                                    $valor=$reservaDados->preco_un;
                                }
                            }else{
                                $valor=$reservaDados->valor_pago;
                            }
                            echo form_label("Valor pago: ");
                            echo form_input(array(
                                'name'      =>  'valor_pago',
                                'id'        =>  'valor_pago',
                                'class'     =>  'form-control',
                                'onkeyup'   =>  'valorPago()',
                                'value'     =>  str_replace('.',',',$valor)
                            ));
                             
                            ?>
                        </div>
                    </div>
                    <br>    
                    <div class="row">
                        
                        <div class="col-md-3">
                            <?php
                            echo form_button(array(
                                'class'=>'btn btn-success',
                                'content'=>'Atualizar Dados',
                                'type'=>'submit'
                            ));
                            echo form_close();
                            ?>
                        </div>
 
                        <div class="col-md-3">
                            <?php
                            echo form_open('home/confirmaPresenca');
                            echo form_hidden('id_tour',$id_tour);
                            echo form_hidden('id_reservs', $id_reservs);
                            echo form_hidden('nr_poltrona',$nr_poltrona);
                            echo "<input type='hidden' id='valorpg' name='valorpg' value='{$valor}'> ";
                            echo form_button(array(
                                'class'     =>'btn btn-success',
                                'content'   =>'<i class="fa fa-check"></i> Presente',
                                'type'      =>'submit'
                            ));
                            echo form_close();
                            ?>
                        </div>

                        <div class="col-md-3">
                            <?php
                            echo form_open('home/confirmaAusencia');
                            echo form_hidden('id_tour',$id_tour);
                            echo form_hidden('id_reservs', $id_reservs);
                            echo form_hidden('nr_poltrona',$nr_poltrona);
                            echo form_button(array(
                                'class'     => 'btn btn-danger',
                                'content'   => '<i class="fa fa-times"></i> Ausente',
                                'type'      => 'submit'
                            ));
                            echo form_close();
                            ?>  
                        </div>
                        
                        <div class="col-md-2">
                            <?php
                            echo form_open('home/guiaMapa');
                            echo form_hidden('id_tour', $id_tour);
                            echo form_button(array(
                                'class' => 'btn btn-info',
                                'content' => '<i class="fa fa-arrow-left"></i> Voltar',
                                'type' => 'submit'
                            ));
                            echo form_close();
                            ?>
                        </div>
                        
                    </div>
                    <!--Fim da Panel verde-->
                </div>
                <div id="relatorio" class=" row-fluid"><!--mater isso escondido aqui-->
                    <!--reserva vai ser colocada aqui-->
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <!-- JavaScript -->
            <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
            <script src="<?= base_url() ?>js/jquery-ui.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                    $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                    $('#celular').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                    //$('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"});
                });
            </script>
    </body>
</html>
<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if ($this->input->post('course')) {
    $this->db->where('nome',$this->input->post('course'));
    $cliente=$this->db->get('tb_clients')->result_array();
    $id_clients=$cliente[0]['id_clients'];
}else{
    $id_clients=$this->input->post('id_clients');
}
if($query[0]->tipo > 0)
    redirect('/home/guiaLista');
else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title><?=$query[0]->titulo?></title>

        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui.css">
    </head>

    <body>

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
                    <a class="navbar-brand" href=""><?=$query[0]->empresa?></a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . "index.php/home/" ?>"><i class="fa fa-dashboard"></i> Geral</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/reserva" ?>"><i class="fa fa-ticket"></i> Reserva</a></li>
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
<!--                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>-->
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/guiaLista" ?>"><i class="fa fa-bus"></i> Guia</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/usuario" ?>"><i class="fa fa-user"></i> Usuário</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/relatorio" ?>"><i class="fa fa-bar-chart-o"></i> Relatórios</a></li>
                    </ul>
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
                        <h1>Cliente <small>Detalhar</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-users"></i><a href="<?php echo base_url() . "index.php/home/cliente" ?>"> Cliente</a> / Detalhar</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Detalhar Cliente</h3>
                    <?php
                    $this->db->where('id_clients', $id_clients);
                    $query = $this->db->get('tb_clients');
                    foreach ($query->result_array() as $row) {
                        $clienteDados = $row;
                    }
                    if($clienteDados['tipo_cliente']==0){
                    $data_nascimento = implode("/", array_reverse(explode("-", $clienteDados['data_nascimento'])));
                    $ult_viagem = implode("/", array_reverse(explode("-", $clienteDados['ult_viagem'])));
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Nome:</th>
                            <td><?= $clienteDados['nome'] ?></td>
                        </tr>
                        <tr>
                            <th>Data Nascimento: </th>
                            <td><?= $data_nascimento ?></td>
                        </tr>
                        <tr>
                            <th>Sexo: </th>
                            <td><?= $clienteDados['sexo']=='f' ? 'Feminino' : 'Masculino' ?></td>
                        </tr>
                        <tr>
                            <th>RG: </th>
                            <td><?= $clienteDados['rg'] ?></td>
                        </tr>
                        <tr>
                            <th>CPF: </th>
                            <td><?= $clienteDados['cpf'] ?></td>
                        </tr>
                        <tr>
                            <th>E-mail: </th>
                            <td><?= $clienteDados['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Telefone: </th>
                            <td><?= $clienteDados['telefone'] ?></td>
                        </tr>
                        <tr>
                            <th>Celular: </th>
                            <td><?= $clienteDados['celular'] ?></td>
                        </tr>
                        <tr>
                            <th>Rua: </th>
                            <td><?= $clienteDados['rua'] ?></td>
                        </tr>
                        <tr>
                            <th>Bairro: </th>
                            <td><?= $clienteDados['bairro'] ?></td>
                        </tr>
                        <tr>
                            <th>Cidade: </th>
                            <td><?= $clienteDados['cidade'] ?></td>
                        </tr>
                        <tr>
                            <th>Local de Embarque: </th>
                            <td><?= $clienteDados['loc_embarque'] ?></td>
                        </tr>
                        <tr>
                            <th>Última Viagem: </th>
                            <td><?= $ult_viagem ?></td>
                        </tr>
                        <tr>
                            <th>Observação: </th>
                            <td><?= $clienteDados['observacao'] ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><a href="<?php echo base_url() . "index.php/home/cliente" ?>" class="btn btn-primary" role="button">Voltar</a></td>
                            <td><?= form_open('home/editarCliente') ?>
                                <input type="hidden" name="id_clients" value="<?= $id_clients ?>" />
                                <input type="submit" class="btn btn-warning" value="Editar">
                                </form></td>
                        </tr>
                    </table>
                    <?php 
                    }else{
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Razão Social: </th>
                            <td><?= $clienteDados['nome'] ?></td>
                        </tr>
                        <tr>
                            <th>Responsável: </th>
                            <td><?= $clienteDados['responsavel'] ?></td>
                        </tr>
                        <tr>
                            <th>CNPJ: </th>
                            <td><?= $clienteDados['cnpj'] ?></td>
                        </tr>
                        <tr>
                            <th>E-mail: </th>
                            <td><?= $clienteDados['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Telefone: </th>
                            <td><?= $clienteDados['telefone'] ?></td>
                        </tr>
                        <tr>
                            <th>Celular: </th>
                            <td><?= $clienteDados['celular'] ?></td>
                        </tr>
                        <tr>
                            <th>Rua: </th>
                            <td><?= $clienteDados['rua'] ?></td>
                        </tr>
                        <tr>
                            <th>Bairro: </th>
                            <td><?= $clienteDados['bairro'] ?></td>
                        </tr>
                        <tr>
                            <th>Cidade: </th>
                            <td><?= $clienteDados['cidade'] ?></td>
                        </tr>
                        <tr>
                            <th>Contatos: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nome 1: </th>
                            <td><?= $clienteDados['contato1'] ?></td>
                        </tr>
                        <tr>
                            <th>Telefone 1: </th>
                            <td><?= $clienteDados['cont_tel1'] ?></td>
                        </tr>
                        <tr>
                            <th>E-mail 1: </th>
                            <td><?= $clienteDados['cont_email1'] ?></td>
                        </tr>
                        <tr>
                            <th>Nome 2: </th>
                            <td><?= $clienteDados['contato2'] ?></td>
                        </tr>
                        <tr>
                            <th>Telefone 2: </th>
                            <td><?= $clienteDados['cont_tel2'] ?></td>
                        </tr>
                        <tr>
                            <th>E-mail 2: </th>
                            <td><?= $clienteDados['cont_email2'] ?></td>
                        </tr>
                        <tr>
                            <th>Nome 3: </th>
                            <td><?= $clienteDados['contato3'] ?></td>
                        </tr>
                        <tr>
                            <th>Telefone 3: </th>
                            <td><?= $clienteDados['cont_tel3'] ?></td>
                        </tr>
                        <tr>
                            <th>E-mail 3: </th>
                            <td><?= $clienteDados['cont_email3'] ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>" class="btn btn-primary" role="button">Voltar</a></td>
                            <td><?= form_open('home/editarCliente') ?>
                                <input type="hidden" name="id_clients" value="<?= $id_clients ?>" />
                                <input type="submit" class="btn btn-warning" value="Editar">
                                </form></td>
                        </tr>
                    </table>
                    <?php } ?>
                    <!--Fim da Panel verde-->
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
            $(function() {
                $('#cpf').mask('000.000.000-00', {placeholder: "___.___.___-__"});
                $('#telefone').mask('(00)0000-0000', {placeholder: "(__)____-____"});
                $('#celular').mask('(00)00000-0000', {placeholder: "(__)_____-____"});
                $('#data_nascimento').mask('00/00/0000', {placeholder: "__/__/____"});
            });
        </script>
    </body>
</html>
<?php
}
?>
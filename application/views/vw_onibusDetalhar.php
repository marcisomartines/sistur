<?php
$form = array('id' => 'form-login', 'class' => 'form-horizontal', 'role' => 'form');
$usuario = array('name' => 'nome', 'id' => 'nome', 'class' => 'form-control');
$lusuario = array('class' => 'form-control');
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
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
                        <li><a href="<?php echo base_url() . "index.php/home/cliente?pagina=0" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda?pagina=0" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
<!--                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>-->
                        <li class="active"><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
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
                        <h1>Ônibus <small>Detalhes</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-truck"></i><a href="<?php echo base_url() . "index.php/home/onibus" ?>"> Ônibus</a> / Detalhar</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="row col-sm-4">
                    <h3>Detalhamento do Ônibus</h3>
                    <?php
                    $this->db->where('id_cars', $this->input->post('id_cars'));
                    $query = $this->db->get('tb_cars');
                    foreach ($query->result_array() as $row) {
                        $onibusDados = $row;
                    }
                    $antt = implode("/", array_reverse(explode("-", $onibusDados['antt'])));
                    $agepan = implode("/", array_reverse(explode("-", $onibusDados['agepan'])));
                    $vistec = implode("/", array_reverse(explode("-", $onibusDados['vistec'])));
                    $inmetro = implode("/", array_reverse(explode("-", $onibusDados['inmetro'])));
                    $seguro_inicio = implode("/", array_reverse(explode("-", $onibusDados['seguro_inicio'])));
                    $seguro_final = implode("/", array_reverse(explode("-", $onibusDados['seguro_final'])));
                    switch ($onibusDados['licenciamento']){
                        case 1:
                            $licenciamento = "Janeiro";
                            break;
                        case 2:
                            $licenciamento = "Fevereiro";
                            break;
                        case 3:
                            $licenciamento = "Março";
                            break;
                        case 4:
                            $licenciamento = "Abril";
                            break;
                        case 5:
                            $licenciamento = "Maio";
                            break;
                        case 6:
                            $licenciamento = "Junho";
                            break;
                        case 7:
                            $licenciamento = "Julho";
                            break;
                        case 8:
                            $licenciamento = "Agosto";
                            break;
                        case 9:
                            $licenciamento = "Setembro";
                            break;
                        case 10:
                            $licenciamento = "Outubro";
                            break;
                        case 11:
                            $licenciamento = "Novembro";
                            break;
                        case 12:
                            $licenciamento = "Dezembro";
                            break;
                    }
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Código: </th>
                            <td><?= $onibusDados['codigo'] ?></td>
                        </tr>
                        <tr>
                            <th>Montadora: </th>
                            <td><?= $onibusDados['montadora'] ?></td>
                        </tr>
                        <tr>
                            <th>Modelo: </th>
                            <td><?= $onibusDados['modelo'] ?></td>
                        </tr>
                        <tr>
                            <th>Placa: </th>
                            <td><?= $onibusDados['placa'] ?></td>
                        </tr>
                        <tr>
                            <th>Ano: </th>
                            <td><?= $onibusDados['ano'] ?></td>
                        </tr>
                        <tr>
                            <th>Chassis: </th>
                            <td><?= $onibusDados['chassis'] ?></td>
                        </tr>
                        <tr>
                            <th>N° Poltronas: </th>
                            <td><?= $onibusDados['nr_poltrona'] ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento ANTT/CRF: </th>
                            <td><?= $antt ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento Agepan: </th>
                            <td><?= $agepan ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento Vistec: </th>
                            <td><?= $vistec ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento INMETRO: </th>
                            <td><?= $inmetro ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento Seguro: </th>
                            <td>Inicio: <?= $seguro_inicio ?><br>Final: <?= $seguro_final ?></td>
                        </tr>
                        <tr>
                            <th>Vencimento Licenciamento: </th>
                            <td><?= $licenciamento ?></td>
                        </tr>
                        <tr>
                            <th>Valor KM: </th>
                            <td>R$<?= $onibusDados['valorkm'] ?></td>
                        </tr>
                        <tr>
                            <th>Situação: </th>
                            <td><?= $onibusDados['status'] ?></td>
                        </tr>
                        <tr>
                            <th>Observação: </th>
                            <td><?= $onibusDados['observacao'] ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><a href="<?php echo base_url() . "index.php/home/onibus" ?>" class="btn btn-primary" role="button">Voltar</a></td>
                            <td><?= form_open('home/editarOnibus') ?>
                                <input type="hidden" name="id_cars" value="<?= $this->input->post('id_cars') ?>" />
                                <input type="submit" class="btn btn-warning" value="Editar">
                                </form></td>
                        </tr>
                    </table>

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
                $('#placa').mask('AAA-0000', {placeholder: "___-____"});
                $('#ano').mask('0000/0000', {placeholder: "____/____"});
                $('#chassis').mask('AAAAAAAAAAAAAAAAA');
                $('#antt').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#agepan').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#vistec').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#inmetro').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#seguro_inicio').mask('00/00/0000', {placeholder: "__/__/____"});
                $('#seguro_final').mask('00/00/0000', {placeholder: "__/__/____"});
            });
        </script>
    </body>
</html>
<?php
}
?>
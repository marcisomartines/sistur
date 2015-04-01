<!DOCTYPE html>
<?php
$this->db->where('nome_user', $this->session->userdata('nome'));
$query = $this->db->get('tb_users');
$query = $query->result();
if($query[0]->tipo > 0)
    redirect('/home/guiaLista');
else{
?>
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
                        <li><a href="<?php echo base_url() . "index.php/home/cliente" ?>"><i class="fa fa-users "></i> Cliente</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/agenda" ?>"><i class="fa fa-calendar"></i> Agendamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/orcamento" ?>"><i class="fa fa-file-text-o"></i> Orçamento</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/onibus" ?>"><i class="fa fa-truck"></i> Ônibus</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/viagem" ?>"><i class="fa fa-tasks"></i> Destino</a></li>
                        <li><a href="<?php echo base_url() . "index.php/home/motorista" ?>"><i class="fa fa-car"></i> Motorista</a></li>
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
                        <h1>Relatório <small>Cliente</small></h1>
                        <ol class="breadcrumb">
                            <li class="active"><i class="fa fa-ticket"></i> Reserva</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
                <div class="controls">
                    <?= form_open('home/relatorioListaPassagem') ?>
                    <table>
                        <tr>
                            <td><?php
                                $query = $this->db->get('tb_viagem');
                                $opcao2[] = '';
                                echo form_label('Destino: ');
                                foreach ($query->result() as $bus) {
                                    $opcao2[$bus->id_viagem] = $bus->destino;
                                }
                                ?></td>
                            <td>                    
                                <?= form_dropdown('id_viagem', $opcao2, $this->input->post('id_viagem'), 'class=form-control') ?>
                            </td>
                            <td>&nbsp;<label>Periodo Inicial: </label></td>
                            <td><input type="text" id="data_inicio" name="data_inicio" class="form-control input-sm"></td>
                            <td><label for="data_final"> eriodo Final: </label></td>
                            <td>&nbsp;<input type="text" id="data_final" name="data_final" class="form-control input-sm"></td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Gerar Relatório">
                    <?= form_close() ?>
                </div>
                <br>
                <div id="relatorio" class=" row-fluid">
                    <?php
                    $cliente = $this->input->post('id_client');
                    $data_inicio = implode("-", array_reverse(explode("/", $this->input->post('data_inicio'))));
                    $data_final = implode("-", array_reverse(explode("/", $this->input->post('data_final'))));
                    $destino = $this->input->post('id_viagem');
                    if (empty($data_final) and empty($destino) and empty($data_inicio)) {//busca todo resultado

                        $query = $this->db->get();
                    }
                     if (empty($data_final) and !empty($destino) and empty($data_inicio)) {//busca por destino
                        $query = $this->db->get();
                    }
                    if (!empty($data_final) and empty($destino)) {//busca todos os destino e todos os clientes mas em um periodo
                        
                    }
                    if (!empty($data_final) and !empty($destino)) {//buscapor um destino em um periodo
                        
                    }
                    ?>
                    <a class="btn btn-primary btn-xs pull-right" href="" onClick="window.open('<?php echo base_url() . "index.php/home/gerarRelatorioCliente?destino=" . $destino ?>&cliente=<?=$cliente?>&data_inicio=<?=$data_inicio?>&data_final=<?=$data_final?>', 'Janela', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=900,height=800,left=0,top=0');
                                        return false;">Imprimir Relatório</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Mês</th>
                            <th>Quantidade</th>
                            
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                            echo "<tr>";
                            echo "<td>".$data_saida."</td>";
                            echo "<td>" . $rel->total . "</td>";
                            
                            echo "</tr>";
                        }
                        ?>
                    </table>
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
        <script src="<?= base_url() ?>js/funcao.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script src="<?= base_url() ?>js/jquery.mask.min.js"></script>
        <script src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script>
    $(function() {
        $("#data_inicio").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            changeMonth: true,
            changeYear: true
        });
    });
        </script>
        <script>
            $(function() {
                $("#data_final").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
    </body>
</html>
<?php
}
?>
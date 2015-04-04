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
    <?php
    $destino = $_GET['destino'];
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    
    switch($mes){
        case 0:
            $nome='Todos';
            break;
        case 1:
            $nome='Janeiro';
            break;
        case 2:
            $nome='Fevereiro';
            break;
        case 3:
            $nome='Mar&ccedil;o';
            break;
        case 4:
            $nome='Abril';
            break;
        case 5:
            $nome='Maio';
            break;
        case 6:
            $nome='Junho';
            break;
        case 7:
            $nome='Julho';
            break;
        case 8:
            $nome='Agosto';
            break;
        case 9:
            $nome='Setembro';
            break;
        case 10:
            $nome='Outubro';
            break;
        case 11:
            $nome='Novembro';
            break;
        case 12:
            $nome='Dezembro';
            break;

    }
    if($destino == 0){
        $nm_destino = 'Todos';
    }else{
        $rel=$this->db->get_where('tb_viagem',array("id_viagem"=>$destino))->row_array();
        $nm_destino=$rel['destino'];
    }
    ?>
    <body>
        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='center'><strong>Demonstrativo de Passagens</strong></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td align='left'><strong>Destino: </strong><?=$nm_destino?></td>
                        </tr>
                        <tr>
                            <td align='left'><strong>Ano: </strong><?= $ano ?></td>
                        </tr>
                        <tr>
                            <td align='left'><strong>M&ecirc;s: </strong><?= $nome ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->
            <?php
            if (empty($destino) and empty($ano) and empty($mes)) {//busca todo resultado
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->order_by('tb_tour.data_saida');
                $query = $this->db->get();
            }
            
            if (!empty($destino) and empty($ano) and empty($mes)) {//busca por destino
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->where('tb_viagem.id_viagem', $destino);
                $this->db->order_by('tb_tour.data_saida');
                $query = $this->db->get();
            }

            if (empty($destino) and ! empty($ano) and empty($mes)) {//busca por ano
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->where('YEAR(tb_tour.data_saida)', $ano);
                $this->db->order_by('tb_tour.data_saida');
                $query = $this->db->get();
            }
            if (!empty($destino) and ! empty($ano) and empty($mes)) {//busca por destino em um ano
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->where('tb_viagem.id_viagem', $destino);
                $this->db->where('YEAR(tb_tour.data_saida)', $ano);
                $this->db->order_by('tb_tour.data_saida');
                $query = $this->db->get();
            }
            if (!empty($destino) and ! empty($ano) and ! empty($mes)) {//busca por um destino em um ano e mes
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->where('tb_viagem.id_viagem', $destino);
                $this->db->where('MONTH(tb_tour.data_saida)', $mes);
                $this->db->where('YEAR(tb_tour.data_saida)', $ano);
                $this->db->order_by('tb_tour.data_saida');
                $query = $this->db->get();
            }
            ?>
            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                    <th>Data</th>
                    <th>Destino</th>
                    <th>Ida</th>
                    <th>Volta</th>
                    <th>Ida/Volta</th>
                    <th>Total</th>
<!--                            <th>Valor</th>-->
                </tr>
                <?php
                foreach ($query->result() as $rel) {
                    $poltrona = 0;
                    $polIda = 0;
                    $polVolta = 0;
                    $total=0;
                    $this->db->where('id_tour', $rel->id_tour);
                    $res = $this->db->get('tb_reservs');
                    foreach ($res->result() as $reserva) {
                        if ($reserva->tipo == 'd') {//verifica se é ida/volta
                            $poltrona++;
                        }
                        if ($reserva->tipo == 'i') {//verifica se é ida
                            $polIda++;
                        }
                        if ($reserva->tipo == 'v') {//verifica se é volta
                            $polVolta++;
                        }
                        $total = $poltrona + $polIda + $polVolta;
                    }
                    $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                    echo "<tr>";
                    echo "<td>" . $data_saida . "</td>";
                    echo "<td>" . $rel->destino . "</td>";
                    echo "<td>" . $polIda . "</td>";
                    echo "<td>" . $polVolta . "</td>";
                    echo "<td>" . $poltrona . "</td>";
                    echo "<td>" . $total . "</td>";
//                            echo "<td>" . $totalPoltrona . "</td>";
                    echo '</tr>';
                }
                ?>
            </table>
        </div><!-- /#page-wrapper -->
        <!--        </div> /#wrapper -->
        <!-- JavaScript -->
        <script src="<?= base_url() ?>js/jquery-1.10.2.js"></script>
        <script src="<?= base_url() ?>js/bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?= base_url() ?>js/morris/chart-data-morris.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/jquery.tablesorter.js"></script>
        <script src="<?= base_url() ?>js/tablesorter/tables.js"></script>
    </body>
</html>

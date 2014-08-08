<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Marciso Gonzalez Martines">

        <title>Pantanal Sul - Turismo</title>

        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    </head>
    <?php
    $destino = $_GET['destino'];
    $data_inicio2 = implode("/", array_reverse(explode("-", $_GET['data_inicio'])));
    $data_final2 = implode("/", array_reverse(explode("-", $_GET['data_final'])));
    if($destino>0){
        $this->db->where('id_viagem',$destino);
        $query=$this->db->get('tb_viagem');
        foreach($query->result() as $des){
            $cidade=$des;
        }
    } else{
        $cidade='Todos';
    }
    ?>
    <body>
        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='center'><strong>Demonstrativo de Viagens</strong></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td align='right'><strong>Período: </strong><?= $data_inicio2 ?> à <?= $data_final2 ?> <strong>Destino: </strong> <?php if(empty($cidade->destino)) echo $cidade; else echo $cidade->destino; ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->
            <?php
            $data_inicio = implode("-", array_reverse(explode("/", $_GET['data_inicio'])));
            $data_final = implode("-", array_reverse(explode("/", $_GET['data_final'])));
            if (empty($data_final) and empty($destino)) {//busca todo resultado
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                $this->db->where('tb_tour.data_saida >', $data_inicio);
                $query = $this->db->get();
            }
            if (!empty($data_final) and empty($destino)) {//busca todos os destino mas em um periodo
                $query = $this->db->query("SELECT * FROM tb_tour
                                                JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                                JOIN tb_cars on tb_cars.id_cars=tb_tour.id_car
                                                where data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                //$query = $this->db->get();
            }
            if (empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                $this->db->select('*');
                $this->db->from('tb_tour');
                $this->db->join('tb_viagem', 'tb_viagem.id_viagem=tb_tour.id_viagem');
                $this->db->join('tb_cars', 'tb_cars.id_cars=tb_tour.id_car');
                $this->db->where('tb_tour.data_saida >', $data_inicio);
                $this->db->where('tb_tour.id_viagem', $destino);
                $query = $this->db->get();
            }
            if (!empty($data_final) and ! empty($destino)) {//busca um destino mas em um periodo
                $query = $this->db->query("SELECT * FROM tb_tour
                                                JOIN tb_viagem on tb_viagem.id_viagem=tb_tour.id_viagem
                                                JOIN tb_cars on tb_cars.id_cars=tb_tour.id_car
                                                where tb_tour.id_viagem=" . $destino . " AND tb_tour.data_saida BETWEEN '" . $data_inicio . "' AND '" . $data_final . "'");
                //$query = $this->db->get();
            }
            ?>
            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                    <th>Cód.</th>
                    <th>Ônibus</th>
                    <th>Dt. Saída</th>
                    <th>Dt. Retorno</th>
                    <th>Ptr. Total</th>
                    <th>Ptr. Usadas</th>
                    <th>Preço</th>
                    <th>Alimen.</th>
                    <th>Combus.</th>
                    <th>Outros</th>
                    <th>Total</th>
                </tr>
                <?php
                foreach ($query->result() as $rel) {
                    $data_saida = implode("/", array_reverse(explode("-", $rel->data_saida)));
                    $data_retorno = implode("/", array_reverse(explode("-", $rel->data_retorno)));
                    $this->db->where('id_tour', $rel->id_tour);
                    $p = $this->db->get('tb_reservs');
                    $poltronas = $p->num_rows();
                    $total = ($poltronas * $rel->preco) - ($rel->alimentacao + $rel->combustivel + $rel->outros);
                    if ($total < 0) {
                        echo '<tr class="danger">';
                    } else {
                        echo "<tr>";
                    }
                    echo "<td>" . $rel->codigo . "</td>";
                    echo "<td>" . $rel->modelo . "</td>";
                    echo "<td>" . $data_saida . "</td>";
                    echo "<td>" . $data_retorno . "</td>";
                    echo "<td>" . $rel->nr_poltrona . "</td>";
                    echo "<td>" . $poltronas . "</td>";
                    echo "<td>R$" . $rel->preco . "</td>";
                    echo "<td>R$" . $rel->alimentacao . "</td>";
                    echo "<td>R$" . $rel->combustivel . "</td>";
                    echo "<td>R$" . $rel->outros . "</td>";
                    echo "<td>R$" . $total . "</td>";
                    echo "</tr>";
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

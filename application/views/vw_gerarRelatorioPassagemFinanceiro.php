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

        <title><?= $query[0]->titulo ?></title>

        <link href="<?= base_url() ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    </head>
    <?php
    $destino = $_GET['destino'];
    $rel=$this->db->query("SELECT * FROM tb_tour tt
                           JOIN tb_viagem tv ON tt.id_viagem=tv.id_viagem
                           JOIN tb_cars tc ON tt.id_car=tc.id_cars
                           WHERE tt.id_tour={$destino}")->row_array();
    $data_saida = implode("/", array_reverse(explode("-", $rel['data_saida'])));
    $data_retorno = implode("/", array_reverse(explode("-", $rel['data_retorno'])));
    ?>
    <body>
        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='center'><strong>Demonstrativo Financeiro da Viagem</strong></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td align='left'><strong>Destino: </strong><?=$rel['destino']?></td>
                        </tr>
                        <tr>
                            <td align='left'><strong>Ônibus: </strong><?=$rel['codigo']?></td>
                        </tr>
                        <tr>
                            <td align='left'><strong>Data Saída: </strong><?=$data_saida?></td>
                        </tr>
                        <tr>
                            <td align='left'><strong>Data Retorno: </strong><?=$data_retorno?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->
            <?php
            $sqlConfirmado="SELECT * FROM tb_reservs tr
                            JOIN tb_clients tc ON tr.id_client=tc.id_clients
                            WHERE tr.id_tour={$destino} AND tr.status='C'
                            ORDER BY tr.nr_poltrona";
            $queryConfirmado=$this->db->query($sqlConfirmado)->result_array();
            
            $sqlAusente="SELECT * FROM tb_reservs tr
                        JOIN tb_clients tc ON tr.id_client=tc.id_clients
                        WHERE tr.id_tour={$destino} AND (tr.status!='C' OR tr.status is null)
                        ORDER BY tr.nr_poltrona";
            $queryAusente=$this->db->query($sqlAusente)->result_array();
            ?>
            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                    <th colspan="3"><center>Confirmados</center></th>
                </tr>
                <tr>
                    <th>Nr.</th>
                    <th>Nome</th>
                    <th>Valor Pago</th>
                </tr>
                <?php
                $total=0;
                foreach ($queryConfirmado as $rel) {
                    $total += $rel['valor_pago'];
                    echo "<tr>";
                    echo "<td>" . $rel['nr_poltrona'] . "</td>";
                    echo "<td>" . $rel['nome'] . "</td>";
                    echo "<td>R$" . $rel['valor_pago'] . "</td>";
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td colspan="2"><strong class="pull-right">Total</strong></td>
                    <td>R$<?=$total?></td>
                </tr>
            </table>
            <br>
            <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                    <th colspan="3"><center>Ausentes</center></th>
                </tr>
                <tr>
                    <th>Nr.</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                </tr>
                <?php
                foreach ($queryAusente as $rel) {

                    echo "<tr>";
                    echo "<td>" . $rel['nr_poltrona'] . "</td>";
                    echo "<td>" . $rel['nome'] . "</td>";
                    echo "<td>" . $rel['celular'] . "</td>";
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
<?php
}
?>
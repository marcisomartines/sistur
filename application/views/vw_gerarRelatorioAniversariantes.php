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
    </head>
    <?php
    $mes=$_GET['mes'];
    ?>
    <body>
        <!--        <div id="wrapper">-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='center'><strong>Lista de Aniversariantes</strong></td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.row -->
             <div id="relatorio" class=" row-fluid">
                    <?php
                        $query=$this->db->query("SELECT * FROM tb_clients WHERE Month(data_nascimento)=".$mes." ORDER BY data_nascimento");
                    ?>
                    <table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <th align='center'>Nome</th>
                            <th>Data</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Tel.</th>
                            <th>Cel.</th>
<!--                            <th>Endereço</th>-->
                        </tr>
                        <?php
                        foreach ($query->result() as $rel) {
                            $data_nascimento = implode("/", array_reverse(explode("-", $rel->data_nascimento)));
                            echo "<tr>";
                            echo "<td>".$rel->nome."</td>";
                            echo "<td>" . $data_nascimento . "</td>";
                            echo "<td>".$rel->rg."</td>";
                            echo "<td>".$rel->cpf."</td>";
                            echo "<td>".$rel->email."</td>";
                            echo "<td>".$rel->telefone."</td>";
                            echo "<td>".$rel->celular."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
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

<?php
$onibus = $_GET['nome'];
$query = $this->db->query("select * from tb_tour
                            join tb_drivers on tb_drivers.id_drivers=tb_tour.id_motorista
                            join tb_cars on tb_cars.id_cars=tb_tour.id_car
                            where tb_tour.id_tour=".$onibus);
if (empty($onibus)) {
    echo "Nenhuma viagem selecionada";
} else {
    //colocar todo as informações daqui pra baixo
    foreach ($query->result_array() as $row) {
        $dados = $row;
    }
    $data_saida = implode("/", array_reverse(explode("-", $dados['data_saida'])));
    $data_retorno = implode("/", array_reverse(explode("-", $dados['data_retorno'])));
    ?>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o"></i> Informações</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                        <tr>
                            <th width='180px'>Ônibus: </th>
                            <td><?= $dados['modelo'] ?></td>
                        </tr>
                        <tr>
                            <th>Destino: </th>
                            <td><?= $dados['destino'] ?></td>
                        </tr>
                        <tr>
                            <th>Data Saída: </th>
                            <td align='left'><?= $data_saida ?></td>
                        </tr>
                        <tr>
                            <th>Data Retorno: </th>
                            <td align='left'><?= $data_retorno ?></td>
                        </tr>
                        <tr>
                            <th>Motorista: </th>
                            <td><?= $dados['nome'] ?></td>
                        </tr>
                        <tr>
                            <th>Preço: </th>
                            <td>R$<?= $dados['preco'] ?></td>
                        </tr>
                        <tr>
                            <th>Poltronas Disponíveis: </th>
                            <td><?= $dados['nr_poltrona'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-map-marker"></i> Mapa Ônibus</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <?php
                            $j=1;
                                for($i=0;$i<($dados['nr_poltrona']/4);$i++)
                                {
                                    echo "<tr>";
                                    echo "<td class='success' data-toggle='modal' data-target='#myModal'>".$j++."</td>";
                                    echo "<td class='success' data-toggle='modal' data-target='#myModal'>".$j++."</td>";
                                    echo "<td></td>";
                                    echo "<td class='success' data-toggle='modal' data-target='#myModal'>".$j++."</td>";
                                    echo "<td class='success' data-toggle='modal' data-target='#myModal'>".$j++."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--aqui termina as tabelas-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservar Poltrona</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
    <?php
}
?>

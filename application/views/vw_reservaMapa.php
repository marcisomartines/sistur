<?php
$onibus = $_GET['nome'];
$this->db->where('id_tour', $onibus);
$query = $this->db->get('tb_tour');
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
                            <td></td>
                        </tr>
                        <tr>
                            <th>Destino: </th>
                            <td></td>
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
                            <td></td>
                        </tr>
                        <tr>
                            <th>Preço: </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Poltronas Disponíveis: </th>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money"></i> Mapa Ônibus</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th>Onibus<i class="fa fa-sort"></i></th>
                                    <th>Ultimo Viagem <i class="fa fa-sort"></i></th>
                                    <th>Hora Saida <i class="fa fa-sort"></i></th>
                                    <th>Valor Total <i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3326</td>
                                    <td>10/21/2013</td>
                                    <td>3:29 PM</td>
                                    <td>$321.33</td>
                                </tr>
                                <tr>
                                    <td>3325</td>
                                    <td>10/21/2013</td>
                                    <td>3:20 PM</td>
                                    <td>$234.34</td>
                                </tr>
                                <tr>
                                    <td>3324</td>
                                    <td>10/21/2013</td>
                                    <td>3:03 PM</td>
                                    <td>$724.17</td>
                                </tr>
                                <tr>
                                    <td>3323</td>
                                    <td>10/21/2013</td>
                                    <td>3:00 PM</td>
                                    <td>$23.71</td>
                                </tr>
                                <tr>
                                    <td>3322</td>
                                    <td>10/21/2013</td>
                                    <td>2:49 PM</td>
                                    <td>$8345.23</td>
                                </tr>
                                <tr>
                                    <td>3321</td>
                                    <td>10/21/2013</td>
                                    <td>2:23 PM</td>
                                    <td>$245.12</td>
                                </tr>
                                <tr>
                                    <td>3320</td>
                                    <td>10/21/2013</td>
                                    <td>2:15 PM</td>
                                    <td>$5663.54</td>
                                </tr>
                                <tr>
                                    <td>3319</td>
                                    <td>10/21/2013</td>
                                    <td>2:13 PM</td>
                                    <td>$943.45</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?= print_r($query->result()) ?>
    </div>
    <?php
}
?>

<?php
$motorista = $this->db->query("SELECT * FROM tb_drivers WHERE Month(validade_cnh)=Month(Now()) AND Year(validade_cnh)=Year(Now())");
if ($motorista->num_rows() > 0) {
    foreach ($motorista->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarMotorista') ?>
                                <input type="hidden" name="id_drivers" value="<?= $res->id_drivers ?>" />
                                <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
                                </form>
            <i class="fa fa-user"></i> Motorista <strong><?=$res->nome?></strong> esta com a <strong>CNH</strong> vencendo esse mês!
            Por favor atualize o cadastro.
        </div>
        <?php
    }
}
?>
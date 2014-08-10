<?php
$antt = $this->db->query("SELECT * FROM tb_cars WHERE Month(antt)=Month(Now()) and Year(antt)=Year(Now())");
if ($antt->num_rows() > 0) {
    foreach ($antt->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarOnibus') ?>
            <input type="hidden" name="id_cars" value="<?= $res->id_cars ?>" />
            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
            </form>
            <i class="fa fa-truck"></i> Ônibus <strong><?= $res->codigo ?></strong> esta com o documento <strong>ANTT/CRF</strong> vencendo esse mês!
            Por favor atualize o cadastro.
        </div>
        <?php
    }
}
$agepan = $this->db->query("SELECT * FROM tb_cars WHERE Month(agepan)=Month(Now()) and Year(agepan)=Year(Now())");
if ($agepan->num_rows() > 0) {
    foreach ($agepan->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarOnibus') ?>
            <input type="hidden" name="id_cars" value="<?= $res->id_cars ?>" />
            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
            </form>
            <i class="fa fa-truck"></i> Ônibus <strong><?= $res->codigo ?></strong> esta com o documento <strong>AGEPAN</strong> vencendo esse mês!
            Por favor atualize o cadastro.
        </div>
        <?php
    }
}
$vistec = $this->db->query("SELECT * FROM tb_cars WHERE Month(vistec)=Month(Now()) and Year(vistec)=Year(Now())");
if ($vistec->num_rows() > 0) {
    foreach ($vistec->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarOnibus') ?>
            <input type="hidden" name="id_cars" value="<?= $res->id_cars ?>" />
            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
            </form>
            <i class="fa fa-truck"></i> Ônibus <strong><?= $res->codigo ?></strong> esta com o documento <strong>VISTEC</strong> vencendo esse mês!
            Por favor atualize o cadastro.
        </div>
        <?php
    }
}
$inmetro = $this->db->query("SELECT * FROM tb_cars WHERE Month(inmetro)=Month(Now()) and Year(inmetro)=Year(Now())");
if ($inmetro->num_rows() > 0) {
    foreach ($inmetro->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarOnibus') ?>
            <input type="hidden" name="id_cars" value="<?= $res->id_cars ?>" />
            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
            </form>
            <i class="fa fa-truck"></i> Ônibus <strong><?= $res->codigo ?></strong> esta com o documento <strong>INMETRO</strong> vencendo esse mês!
            Por favor atualize o cadastro.
        </div>
        <?php
    }
}
$seguro = $this->db->query("SELECT * FROM tb_cars WHERE Month(seguro_final)=Month(Now()) and Year(seguro_final)=Year(Now())");
if ($seguro->num_rows() > 0) {
    foreach ($seguro->result() as $res) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= form_open('home/editarOnibus') ?>
            <input type="hidden" name="id_cars" value="<?= $res->id_cars ?>" />
            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Atualizar">
            </form>
            <i class="fa fa-truck"></i> Ônibus <strong><?= $res->codigo ?></strong> esta com o documento <strong>Seguro</strong> vencendo esse mês!
           Por favor atualize o cadastro.
        </div>
        <?php
    }
}
?>
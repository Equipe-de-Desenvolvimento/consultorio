
<?
$operador_id = $this->session->userdata('operador_id');
$empresa = $this->session->userdata('empresa');
$empresa_id = $this->session->userdata('empresa_id');
$perfil_id = $this->session->userdata('perfil_id');
?>
<div id="page-wrapper"> 
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Guias
            </div>

            <!--</div>-->
        </div>
    </div>
    <div class="panel panel-default ">
        <div class="alert alert-info">
            Dados do Paciente
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id="txtNome" name="nome"  class="form-control" value="<?= $paciente['0']->nome; ?>" readonly/>

                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Sexo</label>
                        <input readonly type="text"  name="sexo" id="txtSexo"  class="form-control texto04"  value="<?
                        if ($paciente['0']->sexo == "M") {
                            echo 'Masculino';
                        } elseif ($paciente['0']->sexo == "F") {
                            echo 'Feminino';
                        } else {
                            echo 'Não Informado';
                        }
                        ?>"/>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Nascimento</label>
                        <input type="text" name="nascimento" id="txtNascimento" class="form-control" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Nome da Mãe</label>
                        <input type="text" name="nome_mae" id="txtNomeMae" class="form-control" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/gravarprocedimentos" method="post">

    </form>
    <div class="panel panel-default ">
        <div class="alert alert-info">
            Guias do Paciente
        </div>
        <div class="panel-body">



            <div class="row">
                <div class="col-lg-12">



                    <?
                    foreach ($guia as $test) :
                        $guia_id = $test->ambulatorio_guia_id;
                        $cancelado = 0;
                        $empresa = 0;
                        if ($test->empresa_id == $empresa_id) {
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th  colspan="9"> Guia:
                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/impressaoguiaconsultaspsadt/<?= $test->ambulatorio_guia_id; ?>');"><?= $test->ambulatorio_guia_id ?></a>

                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarguia/" . $guia_id; ?> ', '_blank', 'width=1000,height=600');">F. Guia

                                                </a>
                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/anexarimagem/" . $guia_id; ?> ', '_blank', 'width=800,height=600');">Arquivos

                                                </a>
                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/guiadeclaracao/" . $guia_id; ?> ', '_blank', 'width=800,height=600');">Declara&ccedil;&atilde;o

                                                </a>
                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/guiaobservacao/" . $guia_id; ?> ', '_blank', 'width=800,height=600');">Observa&ccedil;&atilde;o

                                                </a>
                                                <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/guiaconvenio/" . $guia_id; ?> ', '_blank', 'width=800,height=250');">N. Guia

                                                </a>
                                            </th>
                                    </thead>
                                    </tr>

                                    <thead>
                                        <tr>
                                            <th >
                                               Procedimento
                                            </th>
                                            <th >
                                               Convênio
                                            </th>
                                            <th >
                                               Data
                                            </th>
                                            <th >
                                               Hora
                                            </th>
                                            <th class="text-center">
                                               Ações
                                            </th>
                                            
                                            <th >
                                                Médico
                                               
                                            </th>
                                            <th>
                                               Atendente
                                            </th>
                                            <th class="text-center">
                                               Avançado
                                            </th>

                                        </tr>
                                    </thead>

                                    <?
                                } else {
                                    $empresa ++;
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($exames as $item) :
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";


                                    if ($test->ambulatorio_guia_id == $item->guia_id) {
                                        $cancelado++;
                                        if ($item->empresa_id == $empresa_id) {
                                            ?>
                                            <tr>
                                                <td class="<?php echo $estilo_linha; ?>" width="100px;"><a class="" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/impressaoguiaconsultaconvenio/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>');"><?= $item->procedimento ?></a></td>
                                                <?
                                                if (isset($item->data_antiga)) {
                                                    $data_alterada = 'alterada';
                                                } else {
                                                    $data_alterada = '';
                                                }
                                                ?>
                                                <td class="" >
                                                    <?= $item->convenio ?>
                                                </td>
                                                <td>     
                                                    <?= substr($item->data, 8, 2) . "/" . substr($item->data, 5, 2) . "/" . substr($item->data, 0, 4); ?><br/><?= $data_alterada ?>

                                                </td>

                                                <td class="<?php echo $estilo_linha; ?>" width="30px;"> <?= $item->inicio ?></td>

                                                <td class="tabela_acoes" style="width: 200pt;" >
                                                    <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/escolherdeclaracao/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>');">Declaracao
                                                    </a>

                                                    <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/reciboounota/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>');">Recibo
                                                    </a>

                                                    <?
                                                    $teste = $this->guia->listarfichatexto($item->agenda_exames_id);
                                                    if (isset($teste[0]->agenda_exames_id)) {
                                                        ?>
                                                        <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/editarfichaxml/<?= $paciente['0']->paciente_id; ?>/<?= $item->agenda_exames_id ?>/<?= $item->agenda_exames_id ?>');"> //  Editar F. RM
                                                        </a>
                                                    <? } ?>

                                                </td>
                                                <?
                                                $data_atual = date('Y-m-d');
                                                $data1 = new DateTime($data_atual);
                                                $data2 = new DateTime($item->data);

                                                $intervalo = $data1->diff($data2);
                                                ?>
                                                <!--<td class="<?php echo $estilo_linha; ?>" width="200">Há <?= $intervalo->days ?> dia(s)</td>-->
                                                <? if (isset($item->medicorealizou)) { ?>
                                                    <td class="<?php echo $estilo_linha; ?>" style="padding: 5pt; width: auto;">
                                                        <a style="text-decoration: none; color: black;cursor: pointer;" title="<? echo $item->medicorealizou; ?>" href=""><span style="font-weigth:bolder; text-decoration: underline; color: rgb(255,50,0);">Medico:</span> <? echo substr($item->medicorealizou, 0, 5); ?>(...)</a>
                                                    </td>
                                                <? } ?>

                                                <? if (isset($item->atendente)) { ?>
                                                    <td class="<?php echo $estilo_linha; ?>" style="padding: 5pt; width: auto;">
                                                        <a style="text-decoration: none; color: black;cursor: pointer;" title="<? echo $item->atendente; ?>" href=""><span style="font-weigth:bolder; text-decoration: underline; color: rgb(255,50,0);">Atendente:</span> <? echo substr($item->atendente, 0, 5); ?>(...)</a><br>
                                                    </td>
                                                <? } ?>    

                                                <td class="tabela_acoes" width="30px;">

                                                    <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>ambulatorio/guia/editarexame/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>">Editar
                                                    </a>


                                                    <? if ($perfil_id == 1 || $perfil_id == 6) { ?>

                                                        <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>ambulatorio/guia/valorexame/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>">Valor
                                                        </a>


                                                        <?
                                                    }
                                                    ?>
                                                    <? if (($item->faturado == "f" || $perfil_id == 1) && ($item->dinheiro == "t")) { ?>


                                                        <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturar/" . $item->agenda_exames_id; ?>/<?= $item->procedimento_tuss_id ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=600');">Faturar

                                                        </a>

                                                    <? } else { ?>

                                                    <? } ?>

                                                </td>
                                            </tr>


                                        <? } else {
                                            ?>

                                            <?
                                        }
                                    }
                                endforeach;
                                ?>

                                <?
                                if ($empresa == 0) {


                                    if ($cancelado == 0) {
                                        ?>
                                        <tr>
                                    <td colspan="9"><center><span style="color: rgb(230,0,0); font-weight: bold; font-size: 17px;">PROCEDIMENTO CANCELADO</span></center></td>
                                        </tr>  

                                        <?
                                    }
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th class="tabela_footer" colspan="11">
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <br>
                    <? endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">



    $(function () {
        $(".competencia").accordion({autoHeight: false});
        $(".accordion").accordion({autoHeight: false, active: false});
        $(".lotacao").accordion({
            active: true,
            autoheight: false,
            clearStyle: true

        });


    });
</script>

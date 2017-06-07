<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <?
    $salas = $this->exame->listartodassalas();
    $medicos = $this->operador_m->listarmedicos();
    $especialidade = $this->exame->listarespecialidade();
    $perfil_id = $this->session->userdata('perfil_id');
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/exame/listarmultifuncaomedicoconsulta">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <!--<th>Situação</th>-->
                                <th>Medico</th>
                                <th >Data</th>
                                <th class="text-center">Ações</th>
                            </tr> 
                            <tr class="">
<!--                                <td>

                                    <select name="situacao" id="situacao" class="form-control texto06">
                                        <option value=""></option>
                                        <option value="BLOQUEADO" <?
                                        if (@$_GET['situacao'] == "BLOQUEADO") {
                                            echo 'selected';
                                        }
                                        ?>>BLOQUEADO</option>
                                        <option value="FALTOU" <?
                                        if (@$_GET['situacao'] == "FALTOU") {
                                            echo 'selected';
                                        }
                                        ?>>FALTOU</option>
                                        <option value="OK" <?
                                        if (@$_GET['situacao'] == "OK") {
                                            echo 'selected';
                                        }
                                        ?>>OCUPADO</option>
                                        <option value="LIVRE" <?
                                        if (@$_GET['situacao'] == "LIVRE") {
                                            echo 'selected';
                                        }
                                        ?>>VAGO</option>
                                    </select>

                                </td>-->

                                <td>
                                    <select name="medico" id="medico" class="form-control texto06">
                                        <option value=""> </option>
                                        <? foreach ($medicos as $value) : ?>
                                            <option value="<?= $value->operador_id; ?>"<?
                                            if (@$_GET['medico'] == $value->operador_id):echo 'selected';
                                            endif;
                                            ?>>

                                                <?php echo $value->nome . ' - CRM: ' . $value->conselho; ?>


                                            </option>
                                        <? endforeach; ?>

                                    </select>
                                </td>
                                <td> <input type="text"  id="data" alt="date" name="data" class="form-control texto04"  value="<?php echo @$_GET['data']; ?>" /></td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default  btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 
                        </table> 
                    </form>


                </div>
                <div class="panel-heading ">
                    Atendimento Médico
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!--<div class="table-responsive">-->
                    <?
                    $listas = $this->exame->listarmultifuncao2consulta($_GET)->get()->result();
                    $aguardando = 0;
                    $espera = 0;
                    $finalizado = 0;
                    $agenda = 0;

                    foreach ($listas as $item) {
                        if ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') {
                            $aguardando = $aguardando + 1;
                        } elseif ($item->realizada == 't' && $item->situacaolaudo == 'FINALIZADO') {
                            $finalizado = $finalizado + 1;
                        } elseif ($item->confirmado == 'f') {
                            $agenda = $agenda + 1;
                        } else {
                            $espera = $espera + 1;
                        }
                    }
                    ?>
<!--                        <table class="table">
                            <thead>
                                <tr><td class="tabela_header">Aguardando</td><td class="tabela_header"><?= $aguardando; ?></td></tr>
                                <tr><td class="tabela_header">Espera</td><td class="tabela_header"><?= $espera; ?></td></tr>
                                <tr><td class="tabela_header">Agendado</td><td class="tabela_header"><?= $agenda; ?></td></tr>
                                <tr><td class="tabela_header">Atendido</td><td class="tabela_header"><?= $finalizado; ?></td></tr>
                            </thead>
                        </table>
                    </div>-->
                    <div class="table-responsive">

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Situação</th>
                                    <th>Horário</th>
                                    <th>Paciente</th>
                                    <th>Data</th>
                                    <th>Procedimento</th>
                                    <th>OBS</th>
                                    <th class="tabela_acoes">Ações</th>
                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->exame->listarmultifuncaoconsulta($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 20;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;
                            if ($total > 0) {
                                ?>

                                <?php
                                $lista = $this->exame->listarmultifuncao2consulta($_GET)->limit($limit, $pagina)->get()->result();
                                $estilo_linha = "tabela_content01";
                                $operador_id = $this->session->userdata('operador_id');


                                foreach ($lista as $item) {

                                    $dataFuturo = date("Y-m-d H:i:s");
                                    $dataAtual = $item->data_autorizacao;
                                    $date_time = new DateTime($dataAtual);
                                    $diff = $date_time->diff(new DateTime($dataFuturo));
                                    $teste = $diff->format('%H:%I:%S');

                                    $verifica = 0;

                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    if ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') {
                                        $situacao = "Aguardando";
                                        $verifica = 2;
                                    } elseif ($item->realizada == 't' && $item->situacaolaudo == 'FINALIZADO') {
                                        $situacao = "Finalizado";
                                        $verifica = 4;
                                    } elseif ($item->confirmado == 'f') {
                                        $situacao = "Agenda";
                                        $verifica = 1;
                                    } else {
                                        $situacao = "Espera";
                                        $verifica = 3;
                                    }
                                    ?>
                                    <? if ($verifica == 1) { ?>
                                        <tr class="success2">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td><?= $item->procedimento; ?></td>
                                            <td><?= $item->observacoes; ?></td>
                                            <td class="tabela_acoes">
                                                <? if ($item->situacaolaudo != '') { ?>
                                      
                                                <? if (($item->medico_parecer1 == $operador_id && $item->situacaolaudo == 'FINALIZADO') || ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') || $operador_id == 1) { ?>
                                                    <a class="btn  btn-danger btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregaranaminese/<?= $item->ambulatorio_laudo_id ?>/<?= $item->exame_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');" >
                                                        Atender</a>
                                                <? } else { ?>
                                                <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                <? } ?>
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/anexarimagem/<?= $item->ambulatorio_laudo_id ?>');">
                                                    Arquivos</a>
                                                
                                                <?}else{?>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Arquivos
                                                    </button>
                                                <?}?>
                                            </td>
                                        </tr>  
                                    <? } elseif ($verifica == 2) { ?>
                                        <tr class="alert alert-aguardando">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td><?= $item->procedimento; ?></td>
                                            <td><?= $item->observacoes; ?></td>
                                            <td class="tabela_acoes">
                                                <? if ($item->situacaolaudo != '') { ?>
                                      
                                                <? if (($item->medico_parecer1 == $operador_id && $item->situacaolaudo == 'FINALIZADO') || ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') || $operador_id == 1) { ?>
                                                    <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregaranaminese/<?= $item->ambulatorio_laudo_id ?>/<?= $item->exame_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');" >
                                                        Atender</a>
                                                <? } else { ?>
                                                <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                <? } ?>
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/anexarimagem/<?= $item->ambulatorio_laudo_id ?>');">
                                                    Arquivos</a>
                                                
                                                <?}else{?>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Arquivos
                                                    </button>
                                                <?}?>
                                            </td>
                                        </tr>

                                    <? } elseif ($verifica == 3) { ?>
                                        <tr class="info">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td><?= $item->procedimento; ?></td>
                                            <td><?= $item->observacoes; ?></td>
                                            <td class="tabela_acoes">
                                                <? if ($item->situacaolaudo != '') { ?>
                                      
                                                <? if (($item->medico_parecer1 == $operador_id && $item->situacaolaudo == 'FINALIZADO') || ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') || $operador_id == 1) { ?>
                                                    <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregaranaminese/<?= $item->ambulatorio_laudo_id ?>/<?= $item->exame_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');" >
                                                        Atender</a>
                                                <? } else { ?>
                                                <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                <? } ?>
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/anexarimagem/<?= $item->ambulatorio_laudo_id ?>');">
                                                    Arquivos</a>
                                                
                                                <?}else{?>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Arquivos
                                                    </button>
                                                <?}?>
                                            </td>
                                        </tr>
                                    <? } elseif ($verifica == 4) { ?>
                                        <tr class="finalizado">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td><?= $item->procedimento; ?></td>
                                            <td><?= $item->observacoes; ?></td>
                                            <td class="tabela_acoes">
                                                <? if ($item->situacaolaudo != '') { ?>
                                      
                                                <? if (($item->medico_parecer1 == $operador_id && $item->situacaolaudo == 'FINALIZADO') || ($item->realizada == 't' && $item->situacaolaudo != 'FINALIZADO') || $operador_id == 1) { ?>
                                                    <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregaranaminese/<?= $item->ambulatorio_laudo_id ?>/<?= $item->exame_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');" >
                                                        Atender</a>
                                                <? } else { ?>
                                                <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                <? } ?>
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/anexarimagem/<?= $item->ambulatorio_laudo_id ?>');">
                                                    Arquivos</a>
                                                
                                                <?}else{?>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Atender
                                                    </button>
                                                    <button class="btn  btn-primary btn-sm" disabled="">
                                                        Arquivos
                                                    </button>
                                                <?}?>
                                            </td>
                                        </tr>
                                    <? } ?>

                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <th class="tabela_footer  btn-info" colspan="9">
                                    <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>

                                </th>
                            </tr>
                            <tr>
                                <th class="tabela_footer  btn-info" colspan="9">

                                    Total de registros: <?php echo $total; ?>
                                </th>
                            </tr>

                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>


</div> <!-- Final da DIV content -->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.8.5.custom.min.js" ></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-meiomask.js" ></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
                                                    $(document).ready(function () {
//alert('teste_parada');
                                                        $(function () {
                                                            $('#especialidade').change(function () {

                                                                if ($(this).val()) {

//                                                  alert('teste_parada');
                                                                    $('.carregando').show();
//                                                        alert('teste_parada');
                                                                    $.getJSON('<?= base_url() ?>autocomplete/medicoespecialidade', {txtcbo: $(this).val(), ajax: true}, function (j) {
                                                                        options = '<option value=""></option>';
                                                                        console.log(j);

                                                                        for (var c = 0; c < j.length; c++) {


                                                                            if (j[0].operador_id != undefined) {
                                                                                options += '<option value="' + j[c].operador_id + '">' + j[c].nome + '</option>';

                                                                            }
                                                                        }
                                                                        $('#medico').html(options).show();
                                                                        $('.carregando').hide();



                                                                    });
                                                                } else {
                                                                    $('.carregando').show();
//                                                        alert('teste_parada');
                                                                    $.getJSON('<?= base_url() ?>autocomplete/medicoespecialidadetodos', {txtcbo: $(this).val(), ajax: true}, function (j) {
                                                                        options = '<option value=""></option>';
                                                                        console.log(j);

                                                                        for (var c = 0; c < j.length; c++) {


                                                                            if (j[0].operador_id != undefined) {
                                                                                options += '<option value="' + j[c].operador_id + '">' + j[c].nome + '</option>';

                                                                            }
                                                                        }
                                                                        $('#medico').html(options).show();
                                                                        $('.carregando').hide();



                                                                    });

                                                                }
                                                            });
                                                        });

                                                        $(function () {
                                                            $("#txtCICPrimariolabel").autocomplete({
                                                                source: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
                                                                minLength: 3,
                                                                focus: function (event, ui) {
                                                                    $("#txtCICPrimariolabel").val(ui.item.label);
                                                                    return false;
                                                                },
                                                                select: function (event, ui) {
                                                                    $("#txtCICPrimariolabel").val(ui.item.value);
                                                                    $("#txtCICPrimario").val(ui.item.id);
                                                                    return false;
                                                                }
                                                            });
                                                        });



                                                        $(function () {
                                                            $("#data").datepicker({
                                                                autosize: true,
                                                                changeYear: true,
                                                                changeMonth: true,
                                                                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                                                dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                                                                buttonImage: '<?= base_url() ?>img/form/date.png',
                                                                dateFormat: 'dd/mm/yy'
                                                            });
                                                        });

                                                        $(function () {
                                                            $("#accordion").accordion();
                                                        });

//                                                    setTimeout('delayReload()', 20000);
//                                                    function delayReload()
//                                                    {
//                                                        if (navigator.userAgent.indexOf("MSIE") != -1) {
//                                                            history.go(0);
//                                                        } else {
//                                                            window.location.reload();
//                                                        }
//                                                    }

                                                    });

                                                    setInterval(function () {
                                                        window.location.reload();
                                                    }, 180000);

</script>

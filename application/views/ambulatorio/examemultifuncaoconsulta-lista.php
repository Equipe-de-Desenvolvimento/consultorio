
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <?
    $medicos = $this->operador_m->listarmedicos();
    $especialidade = $this->exame->listarespecialidade();
    $empresas = $this->exame->listarempresas();
    $empresa_logada = $this->session->userdata('empresa_id');
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?php echo base_url() ?>ambulatorio/exame/listarmultifuncaoconsulta">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Situação</th>
                                <th>Medico</th>
                                <th >Data</th>
                                <th class="text-center">Ações</th>
                            </tr> 
                            <tr class="">
                                <td>

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

                                </td>

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
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 
                        </table> 
                    </form>


                </div>
                <div class="panel-heading ">
                    Agendamento
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Situação</th>
                                    <th>Horário</th>
                                    <th>Paciente</th>
                                    <th>Médico</th>
                                    <th>Data</th>
                                    <th class="tabela_acoes">Ações</th>
                                </tr>
                            </thead>


                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->exame->listarexamemultifuncaoconsulta($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 50;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;
                            $l = $this->exame->listarestatisticapacienteconsulta($_GET);
                            $p = $this->exame->listarestatisticasempacienteconsulta($_GET);

                            if ($total > 0) {
                                ?>

                                <?php
                                $lista = $this->exame->listarexamemultifuncaoconsulta2($_GET)->limit($limit, $pagina)->get()->result();
                                $estilo_linha = "tabela_content01";
                                $paciente = "";
                                foreach ($lista as $item) {
                                    $dataFuturo = date("Y-m-d H:i:s");
                                    $dataAtual = $item->data_atualizacao;

                                    if ($item->celular != "") {
                                        $telefone = $item->celular;
                                    } elseif ($item->telefone != "") {
                                        $telefone = $item->telefone;
                                    } else {
                                        $telefone = "";
                                    }

                                    $date_time = new DateTime($dataAtual);
                                    $diff = $date_time->diff(new DateTime($dataFuturo));
                                    $teste = $diff->format('%H:%I:%S');
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";

                                    $faltou = false;
                                    if ($item->paciente == "" && $item->bloqueado == 't') {
                                        $situacao = "Bloqueado";
                                        $paciente = "Bloqueado";
                                        $verifica = 7;
                                    } else {
                                        $paciente = "";

                                        if ($item->realizada == 't' && $item->situacaoexame == 'EXECUTANDO') {
                                            $situacao = "Aguardando";
                                            $verifica = 2;
                                        } elseif ($item->realizada == 't' && $item->situacaolaudo == 'FINALIZADO') {
                                            $situacao = "Finalizado";
                                            $verifica = 4;
                                        } elseif ($item->realizada == 't' && $item->situacaoexame == 'FINALIZADO') {
                                            $situacao = "Atendendo";
                                            $verifica = 5;
                                        } elseif ($item->confirmado == 'f' && $item->operador_atualizacao == null) {
                                            $situacao = "Vago";
                                            $verifica = 1;
                                        } elseif ($item->confirmado == 'f' && $item->operador_atualizacao != null) {
                                            $verifica = 6;
                                            date_default_timezone_set('America/Fortaleza');
                                            $data_atual = date('Y-m-d');
                                            $hora_atual = date('H:i:s');
                                            if ($item->data < $data_atual && $item->paciente_id != null) {
                                                $situacao = "Faltou";
                                                $faltou = true;
                                            }elseif($item->data < $data_atual && $item->paciente_id == null){
                                                $situacao = 'Vago';
                                                $verifica = 1;
                                            } 
                                            else {
                                                $situacao = "Agendado";
                                            }
                                        } else {
                                            $situacao = "Aguardando";
                                            $verifica = 3;
                                        }
                                    }
                                    if ($item->paciente == "" && $item->bloqueado == 'f') {
                                        $paciente = "vago";
                                    }
                                    $data = $item->data;
                                    $dia = strftime("%A", strtotime($data));

                                    switch ($dia) {
                                        case"Sunday": $dia = "Domingo";
                                            break;
                                        case"Monday": $dia = "Segunda";
                                            break;
                                        case"Tuesday": $dia = "Terça";
                                            break;
                                        case"Wednesday": $dia = "Quarta";
                                            break;
                                        case"Thursday": $dia = "Quinta";
                                            break;
                                        case"Friday": $dia = "Sexta";
                                            break;
                                        case"Saturday": $dia = "Sabado";
                                            break;
                                    }
                                    ?>

                                    <? if ($verifica == 1) { ?>
                                        <tr class="">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarconsultatemp/<?= $item->agenda_exames_id ?>');">Consultas
                                                </a>
                                            </td>
                                        </tr>  
                                    <? } elseif ($verifica == 2) { ?>
                                        <tr class="info">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $item->paciente_id ?>/<?= $faltou; ?>');">Consultas
                                                </a>
                                            </td>
                                        </tr>

                                    <? } elseif ($verifica == 3) { ?>
                                        <tr class="info">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn  btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $item->paciente_id ?>/<?= $faltou; ?>');">Consultas
                                                </a>
                                            </td>
                                        </tr>
                                    <? } elseif ($verifica == 4) { ?>
                                        <tr class="finalizado">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $item->paciente_id ?>/<?= $faltou; ?>');">Consultas
                                                </a>
                                            </td>
                                        </tr>
                                    <? } elseif ($verifica == 5) { ?>
                                        <tr class="atendendo">
                                            <td><?= $situacao ?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $item->paciente_id ?>/<?= $faltou; ?>');">Consultas
                                                </a>
                                            </td>
                                        </tr>

                                    <? } elseif ($verifica == 6) {
                                        if($faltou){?>
                                        <tr class="danger">
                                        <?}else{?>
                                        <tr class="agendado">    
                                        <?}?>
                                            <td><?= $situacao?></td>
                                            <td><?= $item->inicio ?></td>
                                            <td><?= $item->paciente ?></td>
                                            <td><?= substr($item->medicoagenda, 0, 15); ?></td>
                                            <td><?= date("d/m/Y", strtotime($item->data)) ?></td>
                                            <td class="tabela_acoes">
                                                <a class="btn btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $item->paciente_id ?>/<?= $faltou; ?>');">Consultas
                                                </a>
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


</div> <!-- Final da DIV page-wrapper -->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
                                        $(document).ready(function () {

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

                                            setTimeout('delayReload()', 20000);
                                            function delayReload()
                                            {
                                                if (navigator.userAgent.indexOf("MSIE") != -1) {
                                                    history.go(0);
                                                } else {
                                                    window.location.reload();
                                                }
                                            }

                                        });

</script>

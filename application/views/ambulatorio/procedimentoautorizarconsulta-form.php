<!--<body onload="alert('blablab');">-->
<form name="form_exametemp" id="form_exametemp" action="<?= base_url() ?>cadastros/pacientes/autorizarambulatoriotempconsulta/<?= $paciente_id; ?>" method="post">
    <div id="page-wrapper"> <!-- Inicio da DIV content -->
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="panel panel-default">-->
                <div class="alert alert-success">
                    Autorizar Atendimento
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
                            <input type="hidden" id="txtpaciente_id" name="txtpaciente_id"  value="<?= $paciente_id; ?>"/>
                            <!--<input type="hidden" id="guia_id" name="guia_id"  value="<?= $ambulatorio_guia_id; ?>"/>-->
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
        <? if (count($consultasanteriores) > 0) { ?>
            <div class="panel panel-default ">
                <div class="alert alert-info">
                    Atendimentos Antigos
                </div>
                <div class="panel-body">


                    <?
                    foreach ($consultasanteriores as $value) {
                        $data_atual = date('Y-m-d');
                        $data1 = new DateTime($data_atual);
                        $data2 = new DateTime($value->data);

                        $intervalo = $data1->diff($data2);
                        ?>
                        <h6><b><?= $intervalo->days ?> dia(s)</b>&nbsp;&nbsp;&nbsp;-ULTIMA ATENDIMENTO: <?= $value->procedimento; ?> - DATA: <b><?= substr($value->data, 8, 2) . '/' . substr($value->data, 5, 2) . '/' . substr($value->data, 0, 4); ?> </b> - M&eacute;dico: <b> <?= $value->medico; ?></b> - Convenio:  <?= $value->convenio; ?></h6>

                    <? }
                    ?>
                </div>
            </div>  
        <? } else {
            ?>
            <div class="panel panel-default ">
                <div class="alert alert-info">
                    Atendimentos Antigos
                </div>
                <div class="panel-body">
                    <h6>NENHUMA ATENDIMENTO ENCONTRADO</h6>
                </div>
            </div>
            <?
        }
        ?>
        <!--<div class="clear"></div>-->
        <!--    <div class="bt_link_new" style="width: 150pt">
                <a style="width: 150pt" onclick="javascript:window.open('<?= base_url() ?>seguranca/operador/novorecepcao');">
                    Novo Medico Solicitante
                </a>
            </div>
            <div class="bt_link_new">
                <a onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/novo/<?= $paciente_id ?>');">
                    Nova guia
                </a>
            </div>-->

        <div>



            <div class="panel panel-default ">


                <div class="alert alert-info">
                    Autorizar Atendimentos
                </div>
                <div class="panel-body">
                    <input type="hidden" name="paciente_id" value="<?= $paciente_id; ?>" />
                    <?
                    $estilo_linha = "tabela_content01";
                    $i = 0;
                    foreach ($exames as $item) {
                        $i++;
                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                        $agenda_exame_id = $item->agenda_exames_id;
                        ?>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">Horário de <?= substr($item->inicio, 0, 5); ?><span class="fa arrow"></span> </a>
                                    </h4>
                                </div>
                                <div id="collapse<?= $i ?>" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12 text-center text-danger">
                                                <h3><?= substr($item->inicio, 0, 5); ?>
                                                <!--<small>Sub-heading</small>-->
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Medico*</label>  
                                                    <select  name="medico_id[<?= $i; ?>]" id="medico_id<?= $i; ?>" class="form-control size2" >
                                                        <option value="">Selecione</option>
                                                        <? foreach ($medicos as $value) : ?>
                                                            <option value="<?= $value->operador_id; ?>" <?
                                                            if ($value->operador_id == $item->medico_consulta_id):echo 'selected';
                                                            endif;
                                                            ?>><?= $value->nome; ?></option>
                                                                <? endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Médico Solicitante</label>  

                                                    <input type="hidden" name="crm[<?= $i; ?>]" id="crm<?= $i; ?>" value="<? //= $medico_solicitante_id;         ?>" class="texto01"/>
                                                    <input type="text" name="medico[<?= $i; ?>]" id="medico<?= $i; ?>" value="<? //= $medico_solicitante;         ?>" class="form-control eac-square" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Convênio</label>  

                                                    <select  name="convenio[<?= $i; ?>]" id="convenio<?= $i; ?>" class="form-control size1"  >
                                                        <option value="">Selecione</option>
                                                        <? foreach ($convenio as $value) : ?>
                                                            <option value="<?= $value->convenio_id; ?>"<?
                                                            if ($value->convenio_id == $item->convenio_agenda){echo'selected';
                                                            }
//                                                
                                                            ?>><?= $value->nome; ?></option>
                                                                <? endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Procedimento*</label>  
                                                    <select  name="procedimento[<?= $i; ?>]" id="procedimento<?= $i; ?>" class="form-control size1" >
                                                        <option value="">-- Escolha um procedimento --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Autorização</label>  

                                                    <input type="text" name="autorizacao[<?= $i; ?>]" id="autorizacao" class="form-control size1"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>V.Unit</label>  

                                                    <input type="text" name="valor[<?= $i; ?>]" id="valor<?= $i; ?>" class="form-control" readonly=""/>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Pagamento</label>  

                                                    <select  name="formapamento[<?= $i; ?>]" id="formapamento<?= $i; ?>" class="form-control size1" >
                                                        <option value="0">Selecione</option>
                                                        <? foreach ($forma_pagamento as $item) : ?>
                                                            <option value="<?= $item->forma_pagamento_id; ?>"><?= $item->nome; ?></option>
                                                        <? endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-lg-2">
                                                                                            <div class="form-group">
                                                                                                <label>Recomendação</label>  
                                            
                                                                                                <select name="indicacao[<?= $i; ?>]" id="indicacao<?= $i; ?>" class="form-control" >
                                                                                                    <option value='' >Selecione</option>
                                            <?php
                                            $indicacao = $this->paciente->listaindicacao($_GET);
                                            foreach ($indicacao as $item) {
                                                ?>
                                                                                                            <option value="<?php echo $item->paciente_indicacao_id; ?>"> <?php echo $item->nome; ?></option>
                                                <?php
                                            }
                                            ?> 
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>-->
                                            <div class="col-lg-1">
                                                <div class="form-group">
                                                    <label>Confirmar</label>  

                                                    <input class="checkbox" type="checkbox" name="confimado[<?= $i; ?>]" id="checkbox<?= $i; ?>" /><input class="checkbox" type="hidden" name="agenda_exames_id[<?= $i; ?>]" value="<?= $agenda_exame_id; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?
                    }
                    ?>

                    <!--</table>--> 
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                            <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Enviar</button>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        </div>
                    </div>


                </div>
            </div>

        </div> <!-- Final da DIV content -->
    </div>
</form><!-- Final da DIV content -->
<!--</body>-->
<?
//var_dump(@$exames); die;
?>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
                        $(document).ready(function () {
                            var convenio_agendado = new Array();
                            var proc_agendado = new Array();

<? for ($b = 1; $b <= $i; $b++) { ?>
    <? $it = ($b == 1) ? '' : $b; ?>                                
                                convenio_agendado[<?= $b - 1 ?>] = <?= @$exames[$b - 1]->convenio_agenda ?>;
                                proc_agendado[<?= $b - 1 ?>] = <?= @$exames[$b - 1]->procedimento_tuss_id ?>;
                                
                                $.getJSON('<?= base_url() ?>autocomplete/procedimentoconvenioconsulta<?= $it ?>', {convenio<?= $b ?>: convenio_agendado[<?= $b - 1 ?>], ajax: true}, function (t) {

                                            var opt = '<option value=""></option>';
                                            var slt = '';
                                            for (var c = 0; c < t.length; c++) {
                                                if (proc_agendado[<?= $b - 1 ?>] == t[c].procedimento_convenio_id) {
                                                    slt = "selected='true'";
                                                    $.getJSON('<?= base_url() ?>autocomplete/procedimentovalor<?= $it ?>', {procedimento<?= $b ?>: t[c].procedimento_convenio_id, ajax: true}, function (a) {
                                                                            var valor = a[0].valortotal;
                                                                            var qtde = a[0].qtde;
                                                                            document.getElementById("valor<?= $b ?>").value = valor;
                                                                            document.getElementById("qtde<?= $b ?>").value = qtde;
                                                                            $('.carregando').hide();
                                                                        });
                                                                    }
                                                                    opt += '<option value="' + t[c].procedimento_convenio_id + '"' + slt + '>' + t[c].procedimento + '</option>';
                                                                    slt = '';
                                                                }
                                                                $('#procedimento<?= $b ?>').html(opt).show();
                                                                $('.carregando').hide();
                                                            });
                                                           
                                                $('#checkbox<?= $b ?>').change(function () {
                                                                if ($(this).is(":checked")) {
                                                                    $("#medico_id<?= $b; ?>").prop('required', true);
                                                                    $("#sala<?= $b; ?>").prop('required', true);
                                                                    $("#convenio<?= $b; ?>").prop('required', true);
                                                                    $("#procedimento<?= $b; ?>").prop('required', true);
                                                                } else {
                                                                    $("#medico_id<?= $b; ?>").prop('required', false);
                                                                    $("#sala<?= $b; ?>").prop('required', false);
                                                                    $("#convenio<?= $b; ?>").prop('required', false);
                                                                    $("#procedimento<?= $b; ?>").prop('required', false);
                                                                }
                                                            });           
<? }
?>

                                                    });

<? for ($b = 1; $b <= $i; $b++) { ?>

                    $(function () {
                        $('#convenio<?= $b ?>').change(function () {
                            if ($(this).val()) {
                                $('.carregando').show();
                                $.getJSON('<?= base_url() ?>autocomplete/procedimentoconvenioconsulta', {convenio1: $(this).val(), ajax: true}, function (j) {
                                    options = '<option value="">Escolha um Procedimento</option>';
                                    for (var c = 0; c < j.length; c++) {
                                        options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + '</option>';
                                    }
                                    $('#procedimento<?= $b ?>').html(options).show();
                                    $('.carregando').hide();
                                });
                            } else {
                                $('#procedimento<?= $b ?>').html('<option value="">Escolha um Convênio</option>');
                            }
                        });
                    });



                    $(function () {
                        $('#procedimento<?= $b ?>').change(function () {
                            if ($(this).val()) {
                                $('.carregando').show();
                                $.getJSON('<?= base_url() ?>autocomplete/procedimentovalorfisioterapia', {procedimento1: $(this).val(), ajax: true}, function (j) {
                                    options = "";
                                    options += j[0].valortotal;
                                    qtde = "";
                                    qtde += j[0].qtde;
                                    document.getElementById("valor<?= $b ?>").value = options;
                                    document.getElementById("qtde<?= $b ?>").value = qtde;
                                    $('.carregando').hide();
                                });
                            } else {
                                $('#valor<?= $b ?>').html('value=""');
                            }
                        });
                    });

                    $(function () {
                        $('#procedimento<?= $b ?>').change(function () {
                            if ($(this).val()) {
                                $('.carregando').show();
                                $.getJSON('<?= base_url() ?>autocomplete/formapagamentoporprocedimento1', {procedimento1: $(this).val(), ajax: true}, function (j) {
                                    var options = '<option value="0">Selecione</option>';
                                    for (var c = 0; c < j.length; c++) {
                                        if (j[c].forma_pagamento_id != null) {
                                            options += '<option value="' + j[c].forma_pagamento_id + '">' + j[c].nome + '</option>';
                                        }
                                    }
                                    $('#formapamento<?= $b ?>').html(options).show();
                                    $('.carregando').hide();
                                });
                            } else {
                                $('#formapamento<?= $b ?>').html('<option value="0">Selecione</option>');
                            }
                        });
                    });


                    var solicitante<?= $b ?> = {
                        url: "<?= base_url() ?>index.php?c=autocomplete&m=medicos",
                        getValue: "value",
                        list: {
                            onSelectItemEvent: function () {
                                var value = $("#medico<?= $b ?>").getSelectedItemData().id;

                                $("#crm<?= $b ?>").val(value).trigger("change");
                            },
                            match: {
                                enabled: true
                            },
                            showAnimation: {
                                type: "fade", //normal|slide|fade
                                time: 200,
                                callback: function () {}
                            },
                            hideAnimation: {
                                type: "slide", //normal|slide|fade
                                time: 200,
                                callback: function () {}
                            },
                            maxNumberOfElements: 20,
                        },
                        theme: "bootstrap"
                    };

                    $("#medico<?= $b ?>").easyAutocomplete(solicitante<?= $b ?>);

<? }
?>


                
                 function calculoIdade() {
                     var data = document.getElementById("txtNascimento").value;
                     var ano = data.substring(6, 12);
                     var idade = new Date().getFullYear() - ano;
                     document.getElementById("txtIdade").value = idade;
                 }

                 calculoIdade();

</script>

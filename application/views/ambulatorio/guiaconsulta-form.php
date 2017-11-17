<?
$sala = "";
$ordenador1 = "";
$sala_id = "";
$medico_id = "";
$medico = "";
$medico_solicitante = "";
$medico_solicitante_id = "";
$convenio_paciente = "";
//var_dump($consultasanteriores);die;
$operador_id = $this->session->userdata('operador_id');
if ($contador > 0) {
    $sala_id = $exames[0]->agenda_exames_nome_id;
    $sala = $exames[0]->sala;
    $medico_id = $exames[0]->medico_agenda_id;
    $medico = $exames[0]->medico_agenda;
    $medico_solicitante = $exames[0]->medico_solicitante;
    $medico_solicitante_id = $exames[0]->medico_solicitante_id;
    if($consultasanteriores[0]->convenio_id != ''){
        $convenio_paciente = $consultasanteriores[0]->convenio_id ;
    }else{
    $convenio_paciente = $exames[0]->convenio_id;
    }
    $ordenador1 = $exames[0]->ordenador;
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Novo Atendimento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/gravarprocedimentosconsulta" method="post">
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
                            <input type="hidden" id="guia_id" name="guia_id"  value="<?= $ambulatorio_guia_id; ?>"/>
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
<!--
        <div class="row">
            <div class="col-lg-12">



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

            </div>
        </div>
-->

        <div class="panel panel-default ">


            <div class="alert alert-info">
                Dados do Atendimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Medico*</label>  
                            <select  name="medicoagenda" id="medicoagenda" class="form-control" required="" >
                                <option value="">Selecione</option>
                                <? foreach ($medicos as $item) : ?>
                                    <option value="<?= $item->operador_id; ?>"<?
                                    if ($medico == $item->operador_id || $operador_id == $item->operador_id){echo 'selected';
                                    }
                                    ?>><?= $item->nome; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Médico Solicitante</label>  

                            <input type="hidden" name="crm1" id="crm1" value="<?= $medico_solicitante_id; ?>" class="texto01"/>
                            <input type="text" name="medico1" id="medico1" value="<?= $medico_solicitante; ?>" class="form-control eac-square" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convênio</label>  

                            <select  name="convenio1" id="convenio1" class="form-control" required="" >
                                <option value="-1">Selecione</option>
                                <? foreach ($convenio as $item) : ?>
                                    <option value="<?= $item->convenio_id; ?>"
                                            <?if($convenio_paciente == $item->convenio_id){echo 'selected';}?>
                                            ><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label>Qtde*</label>  
                            <input type="text" name="qtde1" id="qtde1" value="1" class="form-control texto01" required=""/>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Procedimento*</label>  
                            <select  name="procedimento1"  id="procedimento1" class="form-control" required="" >
                                <option value="">Escolha um Convênio</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Autorização</label>  

                            <input type="text" name="autorizacao1" id="autorizacao" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label>V.Unit</label>  

                            <input type="text" name="valor1" id="valor1" class="form-control" readonly=""/>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Pagamento</label>  

                            <select  name="formapamento" id="formapamento" class="form-control" >
                                <option value="0">Selecione</option>
                                <? foreach ($forma_pagamento as $item) : ?>
                                    <option value="<?= $item->forma_pagamento_id; ?>"><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Recomendação</label>  
                              <select name="indicacao" id="indicacao" class="form-control" >
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Enviar</button>
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                    </div>
                </div>



            </div>
        </div>

    </form>






    <?
    $total = 0;
    $guia = 0;
//    var_dump($contador); die;
    if ($contador > 0) {

        foreach ($grupo_pagamento as $grupo) { //buscar exames com forma de pagamento pre-definida (inicio)
            $exame = $this->exametemp->listarprocedimentocomformapagamento($ambulatorio_guia_id, $grupo->financeiro_grupo_id);
            if ($exame != 0) {
                ?>
                <div class="row">
                    <div class="col-lg-12">


                        <div class="panel panel-default ">
                            <div class="alert alert-info">
                                Agendamentos
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">


                                    <table class="table table-striped table-hover" border="0">
                                        <thead>

                                            <tr>
                                                <th class="tabela_header">Data</th>
                                                <th class="tabela_header">Hora</th>
                                                <th class="tabela_header">Valor</th>
                                                <th class="tabela_header">Procedimento</th>
                                                <th class="tabela_acoes" >Ações</th>
                                            </tr>
                                        </thead>
                                        <?
                                        $total = 0;
                                        $guia = 0;
                                        foreach ($exame as $item) {
                                            ?>
                                            <?
                                            $estilo_linha = "tabela_content01";
                                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                            $total = $total + $item->valor_total;
                                            $guia = $item->guia_id;
                                            ?>

                                            <tr>
                                                <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4); ?></td>
                                                <td class="<?php echo $estilo_linha; ?>"><?= $item->inicio; ?></td>
                                                <td class="<?php echo $estilo_linha; ?>"><?= $item->valor_total; ?></td>
                                                <td class="<?php echo $estilo_linha; ?>"><?= $item->procedimento . "-" . $item->codigo; ?></td>
                                                <td class="<?php echo $estilo_linha; ?>" >
                                                    <a class="btn btn-outline btn-primary" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exame/guiacancelamento/<?= $item->agenda_exames_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');">Cancelar

                                                    </a>
                                                    <a class="btn btn-outline btn-primary" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/impressaoficha/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>');">Ficha
                                                    </a>

                                                    <? if ($item->faturado == "f" && $item->dinheiro == "t") { ?>

                                                        <a class="btn btn-outline btn-primary" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturar/" . $item->agenda_exames_id; ?>/<?= $item->procedimento_tuss_id ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=600');">Faturar</a>


                                                    <? } ?>
                                                </td>

                                            </tr>

                                        </table> 
                                    </div>

                                    <?
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th class="tabela_footer" colspan="6">
                                            Valor Total: <?php echo number_format($total, 2, ',', '.'); ?>
                                        </th>
                                        <th colspan="2" align="center"><center><div class="bt_linkf">
                                        <a onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarguia/" . $guia . '/' . $item->grupo_pagamento_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=600');">Faturar Guia

                                        </a></div></center></th>
                                </tr>
                                </tfoot>
                                </table> 
                                <br/>
                                <?
                            }
                        }//buscar exames com forma de pagamento pre-definida (fim)

                        if ($x > 0) {
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" border="0">
                                    <thead>

                                        <tr>
                                            <th class="tabela_header">Data</th>
                                            <th class="tabela_header">Hora</th>
                                            <th class="tabela_header">Valor</th>
                                            <th class="tabela_header">Procedimento</th>
                                            <th class="tabela_acoes" >Ações</th>
                                        </tr>
                                    </thead>
                                    <?
                                    $total = 0;
                                    $guia = 0;
                                    foreach ($exames as $value) {

                                        $teste = $this->exametemp->verificaprocedimentosemformapagamento($value->procedimento_tuss_id);
                                        if (empty($teste)) {
                                            $exames_sem_formapagamento = $this->exametemp->listarprocedimentosemformapagamento($value->agenda_exames_id);

                                            foreach ($exames_sem_formapagamento as $item) {

                                                $estilo_linha = "tabela_content01";
                                                ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                                $total = $total + $item->valor_total;
                                                $guia = $item->guia_id;
                                                ?>

                                                <tr>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4); ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= $item->inicio; ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= $item->valor_total; ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= $item->procedimento . "-" . $item->codigo; ?></td>
                                                    <td class="tabela_acoes" >
                                                        <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/impressaoficha/<?= $paciente['0']->paciente_id; ?>/<?= $item->guia_id; ?>/<?= $item->agenda_exames_id ?>');">Ficha
                                                        </a>
                                                        <a class="btn btn-outline btn-danger btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exame/guiacancelamento/<?= $item->agenda_exames_id ?>/<?= $item->paciente_id ?>/<?= $item->procedimento_tuss_id ?>');">Cancelar

                                                        </a>


                                                        <? if ($item->faturado == "f" && $item->dinheiro == "t") { ?>

                                                            <a class="btn btn-outline btn-success btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturar/" . $item->agenda_exames_id; ?>/<?= $item->procedimento_tuss_id ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=600');">Faturar</a>


                                                        <? } ?>
                                                    </td>

                                                </tr>

                                                <?
                                            }
                                            ?>

                                            <?
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <th class="tabela_footer" colspan="4">
                                            Valor Total: <?php echo number_format($total, 2, ',', '.'); ?>
                                        </th>
                                        <td align="center" colspan="2">
                                            <a class="btn btn-outline btn-success btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarguia/" . $guia; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=600');">Faturar Guia

                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br/>
                        <? }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    <? } ?>





</div> <!-- Final da DIV content -->
<!--<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">


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

                                                var solicitante = {
                                                    url: "<?= base_url() ?>index.php?c=autocomplete&m=medicos",
                                                    getValue: "value",
                                                    list: {
                                                        onSelectItemEvent: function () {
                                                            var value = $("#medico1").getSelectedItemData().id;

                                                            $("#crm1").val(value).trigger("change");
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

                                                $("#medico1").easyAutocomplete(solicitante);
                                                // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
                                                
                                                var indicacao = {
                                                    url: "<?= base_url() ?>index.php?c=autocomplete&m=indicacao",
                                                    getValue: "value",
                                                    list: {
                                                        onSelectItemEvent: function () {
                                                            var value = $("#indicacaolabel").getSelectedItemData().id;
                                                            $("#indicacao").val(value).trigger("change");
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

                                                $("#indicacaolabel").easyAutocomplete(indicacao);
                                                // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL


                                                $(function () {
                                                    $('#convenio1').change(function () {
                                                        if ($(this).val()) {
                                                            $('.carregando').show();
                                                            $.getJSON('<?= base_url() ?>autocomplete/procedimentoconvenioconsulta', {convenio1: $(this).val(), ajax: true}, function (j) {
                                                                options = '<option value="">Escolha um Procedimento</option>';
                                                                for (var c = 0; c < j.length; c++) {
                                                                    options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + '</option>';
                                                                }
                                                                $('#procedimento1').html(options).show();
                                                                $('.carregando').hide();
                                                            });
                                                        } else {
                                                            $('#procedimento1').html('<option value="">Escolha um Convênio</option>');
                                                        }
                                                    });
                                                });


                                                if ($('#convenio1').val() != -1) {
//                                                    $('.carregando').show();
                                                    $.getJSON('<?= base_url() ?>autocomplete/procedimentoconvenioconsulta', {convenio1: $('#convenio1').val(), ajax: true}, function (j) {
                                                        options = '<option value="">Escolha um Procedimento</option>';
                                                        for (var c = 0; c < j.length; c++) {
                                                            options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + '</option>';
                                                        }
//                                                        $('#procedimento1').html('<option value="">Escolha um Procedimento</option>').show();
                                                        $('#procedimento1').html(options).show();
                                                        $('.carregando').hide();
                                                    });
                                                } else {
                                                    $('#procedimento1').html('<option value="">Escolha um Convênio</option>');
                                                }


                                                $(function () {
                                                    $('#procedimento1').change(function () {
                                                        if ($(this).val()) {
                                                            $('.carregando').show();
                                                            $.getJSON('<?= base_url() ?>autocomplete/procedimentovalor', {procedimento1: $(this).val(), ajax: true}, function (j) {
                                                                options = "";
                                                                options += j[0].valortotal;
                                                                document.getElementById("valor1").value = options
                                                                $('.carregando').hide();
                                                            });
                                                        } else {
                                                            $('#valor1').html('value=""');
                                                        }
                                                    });
                                                });

                                                $(function () {
                                                    $('#procedimento1').change(function () {
                                                        if ($(this).val()) {
                                                            $('.carregando').show();
                                                            $.getJSON('<?= base_url() ?>autocomplete/formapagamentoporprocedimento1', {procedimento1: $(this).val(), ajax: true}, function (j) {
                                                                var options = '<option value="0">Selecione</option>';
                                                                for (var c = 0; c < j.length; c++) {
                                                                    if (j[c].forma_pagamento_id != null) {
                                                                        options += '<option value="' + j[c].forma_pagamento_id + '">' + j[c].nome + '</option>';
                                                                    }
                                                                }
                                                                $('#formapamento').html(options).show();
                                                                $('.carregando').hide();
                                                            });
                                                        } else {
                                                            $('#formapamento').html('<option value="0">Selecione</option>');
                                                        }
                                                    });
                                                });

                                                function calculoIdade() {
                                                    var data = document.getElementById("txtNascimento").value;
                                                    var ano = data.substring(6, 12);
                                                    var idade = new Date().getFullYear() - ano;
                                                    document.getElementById("txtIdade").value = idade;
                                                }

                                                calculoIdade();



</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Faturar Guia
            </div>
        </div>
    </div>
    <div>
        <?
        $sala = "";
        $ordenador1 = "";
        $sala_id = "";
        $medico_id = "";
        $medico = "";
        $medico_solicitante = "";
        $medico_solicitante_id = "";
        $convenio_paciente = "";
        $empresa_id = $this->session->userdata('empresa_id');
        ?>
        <div>
            <form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/gravarprocedimentosfaturamento" method="post">
                <div class="panel panel-default">
                    <div class="alert alert-info">
                        Dados do Paciente
                    </div>

                    <div class="panel-body">


                        <div class="row">


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nome</label>                      
                                    <input type="text" id="txtNome" name="nome"  class="form-control" value="<?= $paciente['0']->nome; ?>" readonly/>
                                    <input type="hidden" id="txtpaciente_id" name="txtpaciente_id"  value="<?= $paciente_id; ?>"/>
                                    <input type="hidden" id="txtguia_id" name="txtguia_id"  value="<?= $guia_id; ?>"/>
                                    <input type="hidden" id="txtdata" name="txtdata"  value="<?= $exames['0']->data; ?>"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" id="txtSexo" class="form-control" disabled="">
                                        <option value="M" <?
                                        if ($paciente['0']->sexo == "M"):echo 'selected';
                                        endif;
                                        ?>>Masculino</option>
                                        <option value="F" <?
                                        if ($paciente['0']->sexo == "F"):echo 'selected';
                                        endif;
                                        ?>>Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Nascimento</label>


                                    <input type="text" name="nascimento" id="txtNascimento" class="form-control" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nome da M&atilde;e</label>
                                    <input type="text" name="nome_mae" id="txtNomeMae" class="form-control" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">


                    <div class="alert alert-info">
                        Dados do Atendimento
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Medico*</label>  
                                    <select  name="medicoagenda" id="medicoagenda" class="form-control" >
                                        <option value="">Selecione</option>
                                        <? foreach ($medicos as $item) : ?>
                                            <option value="<?= $item->operador_id; ?>"<?
                                            if ($medico == $item->nome):echo 'selected';
                                            endif;
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

                                    <select  name="convenio1" id="convenio1" class="form-control" >
                                        <option value="-1">Selecione</option>
                                        <? foreach ($convenios as $item) : ?>
                                            <option value="<?= $item->convenio_id; ?>"><?= $item->nome; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label>Qtde*</label>  
                                    <input type="text" name="qtde1" id="qtde1" value="1" onchange="alteraQuantidade()" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Procedimento*</label>  
                                    <select  name="procedimento1" id="procedimento1" class="form-control" >
                                        <option value="">Selecione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Autorização</label>  

                                    <input type="text" name="autorizacao1" id="autorizacao" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>V.Unit</label>  

                                    <input type="text" name="valor1" id="valor1" class="form-control" readonly=""/>
                                    <input type="hidden" name="valortot" id="valortot" class="texto01" readonly=""/>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Laudo</label>  

                                    <input class="checkbox" type="checkbox" name="laudo" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p>
                                    <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Adicionar</button>

                                    <!--<button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>-->
                                </p>
                            </div>
                        </div>

                    </div>
                </div>  

                <div class="row">
                    <div class="col-lg-12">


                        <div class="panel panel-default ">
                            <div class="alert alert-info">
                                Faturar Guia
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?
                                    $total = 0;
                                    $guia = 0;
                                    ?>
                                    <table class="table" border="0">
                                        <thead>

                                            <tr>
                                                <th class="tabela_header">Data</th>
                                                <th class="tabela_header">Hora</th>
                                                <th class="tabela_header">Valor</th>
                                                <th class="tabela_header">Convenio</th>
                                                <th class="tabela_header">Autorização</th>
                                                <th colspan="2" class="tabela_header">Procedimento</th>

                                                <th  class="tabela_acoes">Ações</th>
                                            </tr>
                                        </thead>
                                        <?
                                        $estilo_linha = "tabela_content01";
                                        foreach ($exames as $item) {
                                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                            $total = $total + $item->valor_total;
                                            $guia = $item->guia_id;
                                            ?>
                                          
                                                <tr>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4); ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data_autorizacao, 11, 8); ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= number_format($item->valor_total, 2, ',', '.'); ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>"><?= $item->convenio; ?></td>
                                                    <td class="<?php echo $estilo_linha; ?>">
                                                        <a style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/alterarautorizacao/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=450');">
                                                            =><?= $item->autorizacao; ?>
                                                        </a>
                                                    </td>
                                                    <td colspan="2" class="<?php echo $estilo_linha; ?>"><?= $item->procedimento; ?></td>
                                                    <!--<td class="<?php echo $estilo_linha; ?>"></td>-->
                                                    <!--<td class="<?php echo $estilo_linha; ?>"></td>-->
                                                    <td class="tabela_acoes" style="width: 140pt;">

                                                    <? if ($item->faturado != "t") { ?>
                                                       
                                                                <a class="btn btn-outline btn-info btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarconvenio/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=250');">Faturar
                                                                </a>
                                                    <? } else { ?>
                                                                              
                                                    <? } ?>
                                                    
                                                            <a class="btn btn-outline btn-info btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/alterardata/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=450');">Alterar Data
                                                            </a>
                                                        </td>
                                                </tr>

                              
                                            <?
                                        }
                                        ?>
                                        <tfoot>
                                            <tr>
                                                <th class="tabela_footer" colspan="7">
                                                    Valor Total: R$ <?php echo number_format($total, 2, ',', '.'); ?>
                                                </th>
                                                <th colspan="2" class="text-center" style=""><div class="bt_link_new">
                                                        <a class="btn btn-outline btn-success btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarguias/" . $guia_id; ?> ');">Faturar todos
                                                        </a>
                                                    </div></th>
                                            </tr>
                                        </tfoot>
                                    </table>  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>

            <fieldset>


            </fieldset>

        </div> 
    </div> 
</div> <!-- Final da DIV content -->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<script type="text/javascript">
                                        function percentual() {
                                            var valordesconto = parseFloat(document.form_guia.desconto.value.replace(",", "."));
                                            var desconto = valordesconto / 100;
                                            var valortot = document.getElementById("valortot").value;
                                            var valor = valortot * desconto;
                                            var r = valor.toFixed(2);

                                            document.getElementById("valor1").value = r;
                                        }

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

                                                        var valorTotal = parseFloat(j[0].valortotal);
                                                        var qt = document.getElementById("qtde1").value;
                                                        document.getElementById("valor1").value = valorTotal;
                                                        document.getElementById("valortot").value = valorTotal;
                                                        $('.carregando').hide();

                                                    });
                                                } else {
                                                    $('#valor1').html('value=""');
                                                }
                                            });
                                        });

                                        function alteraQuantidade() {
                                            if ($("#procedimento1").val()) {
                                                $('.carregando').show();
                                                $.getJSON('<?= base_url() ?>autocomplete/procedimentovalor', {procedimento1: $("#procedimento1").val(), ajax: true}, function (j) {

                                                    var valorTotal = parseFloat(j[0].valortotal);
                                                    var qt = document.getElementById("qtde1").value;
//                                                    document  .getElementById("valor1").value = qt * valorTotal;
                                                    document.getElementById("valortot").value = valorTotal;
                                                    $('.carregando').hide();

                                                });
                                            } else {
                                                $('#valor1').html('value=""');
                                            }
                                        }




</script>
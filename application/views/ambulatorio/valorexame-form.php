<div id="page-wrapper">
    <div >
        <div>
            <form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/guia/valorexames" method="post">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="alert alert-success ">
                            Editar Atendimento
                        </div>
                    </div>
                </div>
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


                                    <input type="text" name="nascimento" id="txtNascimento" class="form-control data" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Nome da M&atilde;e</label>


                                    <input type="text" name="nome_mae" id="txtNomeMae" class="form-control" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
                                </div> 
                            </div>

                        </div>


                    </div> 
                </div> 

                <div class="panel panel-default">
                    <div class="alert alert-info">
                        Valor Procedimento
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Quantidade</label>

                                    <input type="text" name="qtde1" id="qtde1" value="1" class="form-control"/>
                                    <input type="hidden" name="agenda_exames_id" id="agenda_exames_id" value="<?= $ambulatorio_guia_id; ?>"/>
                                    <input type="hidden" name="guia_id" id="guia_id" value="<?= $guia_id; ?>"/>
                                </div> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Convenio</label>

                                    <select  name="convenio1" id="convenio1" class="form-control" >
                                        <option value="-1">Selecione</option>
                                        <? foreach ($convenio as $item) : ?>
                                            <option value="<?= $item->convenio_id; ?>"><?= $item->nome; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Procedimento</label>

                                    <select  name="procedimento1" id="procedimento1" class="form-control" >
                                        <option value="-1">-- Escolha um procedimento --</option>
                                    </select>
                                </div> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Autorizacao</label>

                                    <input type="text" name="autorizacao1" id="autorizacao" class="form-control"/>
                                </div> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Valor Unitario</label>

                                    <input type="text" name="valor1" id="valor1" class="form-control"/>
                                </div> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-5">
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

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <p>
                                    <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>


                                    <button  class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                                </p>
                            </div>
                        </div>

                    </div> 
                </div> 


            </form>
        </div> 
    </div> 
</div> <!-- Final da DIV content -->
<!--<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<!--<script type="text/javascript" src="<?= base_url() ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<script type="text/javascript">

                                        $(function () {
                                            $("#accordion").accordion();
                                        });

                                        $(function () {
                                            $('#convenio1').change(function () {
                                                if ($(this).val()) {
                                                    $('.carregando').show();
                                                    $.getJSON('<?= base_url() ?>autocomplete/procedimentoconveniotodos', {convenio1: $(this).val(), ajax: true}, function (j) {
                                                        var options = '<option value=""></option>';
                                                        for (var c = 0; c < j.length; c++) {
                                                            options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + '</option>';
                                                        }
                                                        $('#procedimento1').html(options).show();
                                                        $('.carregando').hide();
                                                    });
                                                } else {
                                                    $('#procedimento1').html('<option value="">-- Escolha um exame --</option>');
                                                }
                                            });
                                        });


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


                                        $(document).ready(function () {
                                            jQuery('#form_guia').validate({
                                                rules: {
                                                    medico1: {
                                                        required: true,
                                                        minlength: 3
                                                    },
                                                    crm: {
                                                        required: true
                                                    },
                                                    sala1: {
                                                        required: true
                                                    }
                                                },
                                                messages: {
                                                    medico1: {
                                                        required: "*",
                                                        minlength: "!"
                                                    },
                                                    crm: {
                                                        required: "*"
                                                    },
                                                    sala1: {
                                                        required: "*"
                                                    }
                                                }
                                            });
                                        });

</script>
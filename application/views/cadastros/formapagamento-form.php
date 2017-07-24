<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Forma de Pagamento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_contaspagar" id="form_contaspagar" action="<?= base_url() ?>cadastros/formapagamento/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Forma de Pagamento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label >Nome</label>


                            <input type="hidden" name="txtcadastrosformapagamentoid" class="form-control" value="<?= @$obj->_forma_pagamento_id; ?>" />
                            <input type="text" name="txtNome" class="form-control" value="<?= @$obj->_nome; ?>" required/>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Ajuste%</label>


                            <input type="number" name="ajuste" step=0.01 class="form-control" id="ajuste" value="<?= @$obj->_ajuste; ?>" />
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Dia de Recebimento</label>


                            <input type="number" min="0" name="diareceber" class="form-control" id="diareceber" value="<?= @$obj->_dia_receber; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Nesse caso é digitado o dia do mês em que o dinheiro cai na conta após o pagamento ter sido efetuado. Exemplo: Alguns cartões definem que no dia 05 do mês irá ser depositado o dinheiro na conta associada no contrato com o cartão. Se a forma de pagamento que está cadastrando for dinheiro, deixe esse campo com 0 no seu valor "/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tempo de Recebimento</label>


                            <input min="0"  type="number" name="temporeceber" class="form-control" id="temporeceber" value= "<?= @$obj->_tempo_receber; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Nesse caso é digitado o tempo (Em dias) que demora para o cartão depositar o dinheiro na conta do vendedor após o pagamento do cliente. Exemplo: Alguns cartões definem que após 30 dias o dinheiro irá ser depositado na conta do beneficiario. Se a forma de pagamento que está cadastrando for dinheiro, deixe esse campo com 0 no seu valor "/>

                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Fixar</label>
                            <input type="checkbox" class="checkbox" name="arrendondamento" id="arrendondamento" <? if (@$obj->_fixar == 't') { ?>checked <? } ?>  />
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>N° Maximo de Parcelas</label>


                            <input type="number" name="parcelas" class="form-control" id="parcelas" value= "<?= @$obj->_parcelas; ?>" required=""/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor Mínimo da Parcela</label>


                            <input type="text" name="parcela_minima" class="form-control dinheiro" id="parcela_minima" value= "<?= number_format(@$obj->_parcela_minima, 2, ',', '.'); ?>" />
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Conta</label>


                            <select name="conta" id="conta" class="form-control" required>
                                <option value="">SELECIONE</option>
                                <? foreach ($conta as $value) { ?>
                                    <option value="<?= $value->forma_entradas_saida_id ?>" <?
                                    if (@$obj->_conta_id == $value->forma_entradas_saida_id):echo 'selected';
                                    endif;
                                    ?>><?= $value->descricao ?></option>
                                        <? } ?>                            
                            </select>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Credor/Devedor</label>


                            <select name="credor_devedor" id="credor_devedor" class="form-control" required>
                                <option value="">SELECIONE</option>
                                <? foreach ($credor_devedor as $value) { ?>
                                    <option value="<?= $value->financeiro_credor_devedor_id ?>" <?
                                    if (@$obj->_credor_devedor == $value->financeiro_credor_devedor_id):echo 'selected';
                                    endif;
                                    ?>><?= $value->razao_social ?></option>
                                        <? } ?>                            
                            </select>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Forma de Pagamento Cartão</label>


                            <input type="checkbox" class="checkbox" name="cartao" id="cartao" <? if (@$obj->_cartao == 't') { ?>checked <? } ?>  />
                        </div>


                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <p>
                            <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Enviar</button>

                            <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        </p>
                    </div>
                </div>

            </div>

        </div><!-- Inicio da DIV content -->
    </form>

</div>
<!-- Final da DIV content -->

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });


    $('#temporeceber').blur(function () {
        if ($(this).val() > 0) {
//            alert('sd');
            $("#diareceber").prop('readonly', true);
//            
        } else {
            $("#diareceber").prop('readonly', false);
//            
        }
    });

    $('#diareceber').blur(function () {
        if ($(this).val() > 0) {
//            alert('sd');
            $("#temporeceber").prop('readonly', true);
//            
        } else {
            $("#temporeceber").prop('readonly', false);
//            
        }
    });

    if ($("#diareceber").val() > 0) {
//            alert('sd');
        $("#temporeceber").prop('readonly', true);
//            
    } else {
        $("#temporeceber").prop('readonly', false);
//            
    }

    if ($("#temporeceber").val() > 0) {
//            alert('sd');
        $("#diareceber").prop('readonly', true);
//            
    } else {
        $("#diareceber").prop('readonly', false);
//            
    }
    
    
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });
    // popover demo
    $("[data-toggle=popover]")
        .popover();


</script>

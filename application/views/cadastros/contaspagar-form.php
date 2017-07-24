<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Contas a Pagar
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_contaspagar" id="form_contaspagar" action="<?= base_url() ?>cadastros/contaspagar/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Contas a Pagar
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor *</label>
                            <input type="text" name="valor"  id="valor" alt="decimal" class="form-control dinheiro" value="<?= number_format(@$obj->_valor, 2, ',', '.'); ?>"/>
                            <input type="hidden" id="saida_id" class="texto_id" name="saida_id" value="<?= @$obj->_saida_id; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data*</label>

                            <input type="text" name="inicio" id="inicio" class="form-control data" alt="date" value="<?= substr(@$obj->_data, 8, 2) . '/' . substr(@$obj->_data, 5, 2) . '/' . substr(@$obj->_data, 0, 4); ?>" required=""/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Pagar a:</label>

                            <input type="hidden" id="credor" class="texto_id" name="credor" value="<?= @$obj->_credor; ?>"/>
                        <input type="text" id="credorlabel" class="form-control" name="credorlabel" value="<?= @$obj->_razao_social; ?>"  required=""/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo Número</label>

                            <input type="text" name="tiponumero" id="tiponumero" class="form-control" value="<?= @$obj->_tipo_numero; ?>"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo</label>


                            <select name="tipo" id="tipo" class="form-control">
                                <option value="">Selecione</option>
                                <? foreach ($tipo as $value) : ?>
                                    <option value="<?= $value->tipo_entradas_saida_id; ?>"                            
                                    <?
                                    if ($value->descricao == @$obj->_tipo):echo'selected';
                                    endif;
                                    ?>
                                            ><?php echo $value->descricao; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>

                    </div>

                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Classe *</label>

                            <select name="classe" id="classe" class="form-control" required="">
                                <option value="">Selecione</option>
                                <? foreach ($classe as $value) : ?>
                                    <option value="<?= $value->descricao; ?>"
                                    <?
                                    if ($value->descricao == @$obj->_classe):echo'selected';
                                    endif;
                                    ?>
                                            ><?php echo $value->descricao; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Forma*</label>

                            <select name="conta" id="conta" class="form-control" required="">
                                <option value="">Selecione</option>
                                <? foreach ($conta as $value) : ?>
                                    <option value="<?= $value->forma_entradas_saida_id; ?>"<?
                                    if (@$obj->_conta_id == $value->forma_entradas_saida_id):echo'selected';
                                    endif;
                                    ?>><?php echo $value->descricao; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Repetir</label>

                            <input type="text" name="repitir" alt="integer" class="form-control" value="<?= @$obj->_numero_parcela; ?>"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Observa&ccedil;&atilde;o</label>
                            <textarea cols="70" rows="3" name="Observacao" class="form-control" id="Observacao"><?= @$obj->_observacao; ?></textarea><br/>
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

        </div><!-- Inicio da DIV content -->
    </form>

</div>
 <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">

//    $(function () {
//        $("#credorlabel").autocomplete({
//            source: "<?= base_url() ?>index.php?c=autocomplete&m=credordevedor",
//            minLength: 1,
//            focus: function (event, ui) {
//                $("#credorlabel").val(ui.item.label);
//                return false;
//            },
//            select: function (event, ui) {
//                $("#credorlabel").val(ui.item.value);
//                $("#credor").val(ui.item.id);
//                return false;
//            }
//        });
//    });


    $(function () {
        $('#tipo').change(function () {
            if ($(this).val()) {
                $('.carregando').show();
                $.getJSON('<?= base_url() ?>autocomplete/classeportiposaidalista', {nome: $(this).val(), ajax: true}, function (j) {
                    options = '<option value=""></option>';
                    for (var c = 0; c < j.length; c++) {
                        options += '<option value="' + j[c].classe + '">' + j[c].classe + '</option>';
                    }
                    $('#classe').html(options).show();
                    $('.carregando').hide();
                });
            } else {
                $('#classe').html('<option value="">TODOS</option>');
            }
        });
    });

    $(function () {
        $("#inicio").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

    // NOVOS AUTOCOMPLETES.
    // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
    // Url é a função que vai trazer o JSON.
    // getValue é onde se define o nome do campo que você quer que apareça na lista
    // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
    // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
    // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
    // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
    // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

    var credor = {
        url: "<?= base_url() ?>index.php?c=autocomplete&m=credordevedor",
        getValue: "value",
        list: {
            onSelectItemEvent: function () {
                var value = $("#credorlabel").getSelectedItemData().id;

                $("#credor").val(value).trigger("change");
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

    $("#credorlabel").easyAutocomplete(credor);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Confirmar Contas a Receber
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_contasreceber" id="form_contasreceber" action="<?= base_url() ?>cadastros/contasreceber/confirmar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Conta
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor *</label>
                            <input type="text" name="valor"  id="valor" alt="decimal" class="form-control dinheiro" readonly="true" value="<?= number_format(@$obj->_valor, 2, ',', '.'); ?>"/>
                            <input type="hidden" id="financeiro_contasreceber_id" class="texto_id" name="financeiro_contasreceber_id" value="<?= @$obj->_financeiro_contasreceber_id; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data*</label>

                            <input type="text" name="inicio" id="inicio" class="form-control data" alt="date" value="<?= substr(@$obj->_data, 8, 2) . '/' . substr(@$obj->_data, 5, 2) . '/' . substr(@$obj->_data, 0, 4); ?>" readonly="true"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Receber de:</label>

                            <input type="hidden" id="devedor" class="texto_id" name="devedor" value="<?= @$obj->_devedor; ?>" />
                            <input type="text" id="credorlabel" class="form-control" name="devedorlabel" value="<?= @$obj->_razao_social; ?>"  readonly="true"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo Número</label>

                             <input type="text" name="tiponumero" id="tiponumero" class="form-control" value="<?= @$obj->_tipo_numero; ?>" readonly="true"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo</label>


                            <input type="text" name="tipo" id="tipo"  class="form-control" value="<?= @$obj->_tipo; ?>" readonly="true"/>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Classe *</label>

                            <input type="text" name="classe" id="classe"  class="form-control" value="<?= @$obj->_classe; ?>" readonly="true"/>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Forma*</label>

                            <input type="text" name="conta" class="form-control" value="<?= @$obj->_conta; ?>" readonly="true"/>
                            <input type="hidden" name="conta_id" class="form-control" value="<?= @$obj->_conta_id; ?>"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Repetir</label>

                            <input type="text" name="repitir" alt="integer" class="form-control" value="<?= @$obj->_numero_parcela; ?>" readonly="true"/>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Observa&ccedil;&atilde;o</label>
                            <textarea cols="70" rows="3" name="Observacao" class="form-control" readonly="" id="Observacao"><?= @$obj->_observacao; ?></textarea><br/>
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
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });


    $(function () {
        $("#devedorlabel").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=credordevedor",
            minLength: 1,
            focus: function (event, ui) {
                $("#devedorlabel").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#devedorlabel").val(ui.item.value);
                $("#devedor").val(ui.item.id);
                return false;
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

    $(document).ready(function () {
        jQuery('#form_emprestimo').validate({
            rules: {
                valor: {
                    required: true
                },
                contasreceber: {
                    required: true
                },
                inicio: {
                    required: true
                }
            },
            messages: {
                valor: {
                    required: "*"
                },
                contasreceber: {
                    required: "*"
                },
                inicio: {
                    required: "*"
                }
            }
        });
    });
</script>
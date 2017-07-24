<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-warning">
                Transferência
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_emprestimo" id="form_emprestimo" action="<?= base_url() ?>cadastros/caixa/gravartransferencia" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Transferência
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor *</label>
                            <input type="text" name="valor" alt="decimal" class="form-control dinheiro" required=""/>

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data*</label>


                            <input type="text" name="inicio" id="inicio" class="form-control data" required/>

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Conta Saida</label>


                            <select name="conta" id="conta" class="form-control" required>
                                <? foreach ($conta as $value) : ?>
                                    <option value="<?= $value->forma_entradas_saida_id; ?>"><?php echo $value->descricao; ?></option>
                                <? endforeach; ?>
                            </select>

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Conta Entrada</label>


                            <select name="contaentrada" id="contaentrada" class="form-control" required>
                                <? foreach ($conta as $item) : ?>
                                    <option value="<?= $item->forma_entradas_saida_id; ?>"><?php echo $item->descricao; ?></option>
                                <? endforeach; ?>
                            </select>

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Observações</label>


                            <textarea cols="70" rows="3" name="Observacao" required class="form-control" id="Observacao"></textarea>

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
        $("#accordion").accordion();
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
                tipo: {
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
                tipo: {
                    required: "*"
                },
                inicio: {
                    required: "*"
                }
            }
        });
    });
</script>
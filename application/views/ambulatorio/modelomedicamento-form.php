<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div id="accordion">
        <!--<h3 class="singular"><a href="#">Cadastro Modelo Medicamento</a></h3>-->
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="panel panel-default">-->
                <div class="alert alert-success">
                    Cadastro Modelo Medicamento
                </div>

                <!--</div>-->
            </div>
        </div>
        <div>
            <form name="form_novomedicamento" id="form_novomedicamento" action="<?= base_url() ?>ambulatorio/modelomedicamento/gravar" method="post">
                <div class="panel panel-default ">
                    <div class="alert alert-info">
                        Dados da Contas a Pagar
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nome</label>


                                    <input type="hidden" name="txtmedicamentoID" id="txtmedicamentoID" class="form-control">
                                    <input type=text" name="txtmedicamento" id="txtmedicamento" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Quantidade</label>

                                    <input type=text" name="qtde" id="qtde" class="form-control" alt="integer">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Unidade</label>


                                    <input type=hidden" name="unidadeid" id="unidadeid" class="form-control" style="display: none;">
                                    <input type=text" name="unidade" id="unidade" class="form-control eac-square">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Posologia</label>
                                    <input type=text" name="posologia" id="posologia" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <p>
                                    <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Enviar</button>
                                    <!--</div>-->
                                    <!--<div class="col-lg-1">-->
                                    <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<hr/>-->

                <!--<button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>-->
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(document).ready(function () {
//        $(function () {
//            $("#unidade").autocomplete({
//                source: "<?= base_url() ?>index.php?c=autocomplete&m=medicamentounidade",
//                minLength: 1,
//                focus: function (event, ui) {
//                    $("#unidade").val(ui.item.label);
//                    return false;
//                },
//                select: function (event, ui) {
//                    $("#unidadeid").val(ui.item.id);
//                    $("#unidade").val(ui.item.value);
//                    return false;
//                }
//            });
//        });


        var unidade = {
            url: "<?= base_url() ?>index.php?c=autocomplete&m=medicamentounidade",
            getValue: "value",
            list: {
                onSelectItemEvent: function () {
                    var value = $("#unidade").getSelectedItemData().id;

                    $("#unidadeid").val(value).trigger("change");
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
                maxNumberOfElements: 20
            },
            theme: "bootstrap"
        };

        $("#unidade").easyAutocomplete(unidade);

        jQuery('#form_novomedicamento').validate({
            rules: {
                txtmedicamento: {
                    required: true,
                    minlength: 3
                },
                qtde: {
                    required: true
                },
                unidade: {
                    required: true
                },
                posologia: {
                    required: true
                }
            },
            messages: {
                txtmedicamento: {
                    required: "*",
                    minlength: "!"
                },
                qtde: {
                    required: "*"
                },
                unidade: {
                    required: "*"
                },
                posologia: {
                    required: "*"
                }
            }
        });
    });

</script>
<div id="page-wrapper"> <!-- Inicio da DIV content -->


    <form name="form_procedimento" id="form_procedimento" action="<?= base_url() ?>ambulatorio/procedimento/gravartuss" method="post">
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="panel panel-default">-->
                <div class="alert alert-success">
                    Cadastro de Procedimento TUSS
                </div>

                <!--</div>-->
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div >
                            <label>Nome*</label>
                            <input type="text" name="txtNome" class="form-control texto10" value="<?= @$procedimento[0]->descricao; ?>" />
                            <input type="hidden" name="tuss_id" value="<?= @$procedimento[0]->tuss_id; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div >
                            <label>Codigo*</label>
                            <input type="text" name="procedimento" id="procedimento" class="form-control" value="<?= @$procedimento[0]->codigo; ?>"/>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div >
                            <label>Valor R$</label>
                            <input type="text" name="txtvalor" id="valor" data-thousands="." data-decimal="," class="form-control" value="<?= number_format(@$procedimento[0]->valor, 2, ',', '.') ; ?>"/>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div >

                            <label>Classificaco</label>
                            <select name="classificaco" id="classificaco" class="form-control" >
                                <option value='' >Selecione</option>
                                <?php foreach ($classificacao as $item) { ?>
                                    <option value="<?php echo $item->tuss_classificacao_id; ?>" <?
                                    if ($item->tuss_classificacao_id == @$procedimento[0]->classificacao):echo 'selected';
                                    endif;
                                    ?>><?php echo $item->nome; ?></option>
                                        <?php } ?>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div >
                            <label>Texto</label>
                            <textarea id="laudo" class="form-control" name="laudo" rows="10" ><?= @$procedimento[0]->texto; ?></textarea>
                        </div>


                    </div>
                </div>
                <br>
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


</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(function () {
        $("#txtprocedimentolabel").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=procedimentotuss",
            minLength: 3,
            focus: function (event, ui) {
                $("#txtprocedimentolabel").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#txtprocedimentolabel").val(ui.item.value);
                $("#txtprocedimento").val(ui.item.id);
                $("#txtcodigo").val(ui.item.codigo);
                $("#txtdescricao").val(ui.item.descricao);
                return false;
            }
        });
    });

//    $(function () {
//        $("#valor").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
//    })



</script>
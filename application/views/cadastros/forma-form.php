<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Conta
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_contaspagar" id="form_contaspagar" action="<?= base_url() ?>cadastros/forma/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Conta
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nome</label>

                            <input type="hidden" name="txtcadastrosformaid" class="form-control" value="<?= @$obj->_forma_entradas_saida_id; ?>" />
                            <input type="text" name="txtNome" class="form-control" value="<?= @$obj->_descricao; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Agencia</label>
                            <input type="text" name="txtagencia" class="form-control" value="<?= @$obj->_agencia; ?>" />
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Conta</label>

                            <input type="text" name="txtconta" class="form-control" value="<?= @$obj->_conta; ?>" />
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

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });


    $(document).ready(function () {
        jQuery('#form_forma').validate({
            rules: {
                txtNome: {
                    required: true,
                    minlength: 3
                },
                txtagencia: {
                    required: true
                },
                txtconta: {
                    required: true
                }
            },
            messages: {
                txtNome: {
                    required: "*",
                    minlength: "!"
                },
                txtagencia: {
                    required: "*"
                },
                txtconta: {
                    required: "*"
                }
            }
        });
    });

</script>
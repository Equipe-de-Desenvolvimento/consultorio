<div id="page-wrapper"> <!-- Inicio da DIV content -->

    <div class="panel panel-default">
        <div class="alert alert-info">Editar de Motivo cancelamento</div>
        <div class="panel-body">
            <form name="form_sala" id="form_sala" action="<?= base_url() ?>ambulatorio/motivocancelamento/gravar" method="post">


                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label>Nome</label>

                        <input type="hidden" name="txtambulatoriomotivocancelamentoid" class="texto10" value="<?= @$obj->_ambulatorio_cancelamento_id; ?>" />
                        <input type="text" name="txtNome" class="form-control" value="<?= @$obj->_descricao; ?>" required/>
                    </div>    
                </div>    
                <div class="row">
                    <div class="col-lg-4">
                        <p>
                        <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o fa-fw"></i> Enviar</button>
                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        <!--<button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>-->
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ambulatorio/motivocancelamento');
    });

    $(function () {
        $("#accordion").accordion();
    });


    $(document).ready(function () {
        jQuery('#form_sala').validate({
            rules: {
                txtNome: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                txtNome: {
                    required: "*",
                    minlength: "!"
                }
            }
        });
    });

</script>
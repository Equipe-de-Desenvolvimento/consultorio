<div id="page-wrapper"> <!-- Inicio da DIV content -->
 <form name="form_convenio" id="form_convenio" action="<?= base_url() ?>cadastros/convenio/gravarcopia" method="post">
    <div class="panel panel-default ">
        <div class="alert alert-info">
            Dados do Convênio
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-5">
                   

                        <div class="form-group">


                            <label>Copiar Convenio</label>


                            <select name="txtconvenio" id="txtconvenio" class="form-control">
                                <? foreach ($convenio as $value) : ?>
                                    <option value="<?= $value->convenio_id; ?>"><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                            <input type="hidden" name="txtconvenio_id"value="<?= $convenioid; ?>" />

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


    $(document).ready(function () {
        jQuery('#form_sala').validate({
            rules: {
                txtNome: {
                    required: true,
                    minlength: 3
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
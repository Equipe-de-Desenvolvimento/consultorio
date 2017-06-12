<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Classe
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_contaspagar" id="form_contaspagar" action="<?= base_url() ?>cadastros/classe/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados da Classe
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" name="txtfinanceiroclasseid" class="form-control" value="<?= @$obj->_financeiro_classe_id; ?>" />
                            <input type="text" name="txtNome" class="form-control" value="<?= @$obj->_descricao; ?>" required/>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo</label>


                            <select name="txttipo_id" id="txttipo_id" class="form-control" required>
                                <? foreach ($tipo as $value) : ?>
                                    <option value="<?= $value->tipo_id; ?>"<?
                                    if (@$obj->_tipo_id == $value->tipo_id):echo 'selected';
                                    endif;
                                    ?>><?= $value->descricao; ?></option>
                                        <? endforeach; ?>
                            </select>
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
        $(location).attr('href', '<?= base_url(); ?>cadastros/classe');
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


<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Procedimento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/procedimentoplano/gravarpercentualpromotor" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convênio*</label>
                            <select name="covenio" id="covenio" class="form-control" required>
                                <option value="">Selecione</option>
                                <? foreach ($convenio as $value) : ?>
                                    <option  value="<?= $value->convenio_id; ?>"><?php echo $value->nome; ?></option>                            
                                <? endforeach; ?>                                                                                             
                            </select> 
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Grupo*</label>
                            <select name="grupo" id="grupo" class="form-control" required="">
                                <option value="">SELECIONE</option>
                                <option>TODOS</option>                 
                                <? foreach ($grupo as $value) : ?>
                                    <option value="<?= $value->nome; ?>"><?php echo $value->nome; ?></option>
                                <? endforeach; /* $value->ambulatorio_grupo_id; */ ?>

                            </select>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Procedimento</label>
                            <select  name="procedimento" id="procedimento" class="form-control">
                                <option value="">SELECIONE</option>
                            </select>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Promotor</label>
                            <select name="promotor" id="medico" class="form-control" required>
                                <option value="">SELECIONE</option>
                                <option>TODOS</option>
                                <? foreach ($promotor as $value) : ?>
                                    <option value="<?= $value->paciente_indicacao_id; ?>"><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" name="valor" id="valor" class="form-control" required/>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Percentual</label>
                            <select name="percentual"  id="percentual" class="form-control">  

                                <option value="1"> SIM</option>
                                <option value="0"> NÃO</option>                               
                            </select>
                        </div>


                    </div>
                </div>

                <br>
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
    </form>

</div> 
 <!-- Final da DIV content -->

<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(function () {
        $('#covenio').change(function () {
            if ($(this).val()) {
                if ($('#grupo').val() == "TODOS") {
                    $('.carregando').show();
                    $.getJSON('<?= base_url() ?>autocomplete/procedimentoporconvenio', {covenio: $(this).val(), ajax: true}, function (j) {
                        options = '<option value="">TODOS</option>';
                        for (var c = 0; c < j.length; c++) {
                            options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + ' - ' + j[c].codigo + '</option>';
                        }
                        $('#procedimento').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    if ($('#grupo').val() != "SELECIONE") {
                        $.getJSON('<?= base_url() ?>autocomplete/procedimentoconveniogrupo', {grupo1: $('#grupo').val(), convenio1: $(this).val()}, function (j) {
                            options = '<option value=""></option>';
                            for (var c = 0; c < j.length; c++) {
                                options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + ' - ' + j[c].codigo + '</option>';
                            }
                            $('#procedimento').html(options).show();
                            $('.carregando').hide();
                        });
                    }
                }
            } else {
                $('#procedimento').html('<option value="">SELECIONE</option>');
            }
        });
    });

    $(function () {
        $('#grupo').change(function () {
            if ($('#covenio').val() != 'SELECIONE' && $('#grupo').val() != 'TODOS') {
                $('.carregando').show();
                $.getJSON('<?= base_url() ?>autocomplete/procedimentoconveniogrupo', {grupo1: $(this).val(), convenio1: $('#covenio').val()}, function (j) {
                    options = '<option value=""></option>';
                    for (var c = 0; c < j.length; c++) {
                        options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + ' - ' + j[c].codigo + '</option>';
                    }
                    $('#procedimento').html(options).show();
                    $('.carregando').hide();
                });
            } else {

                if ($('#grupo').val() == 'TODOS') {
                    $('.carregando').show();
                    $.getJSON('<?= base_url() ?>autocomplete/procedimentoporconvenio', {covenio: $('#covenio').val(), ajax: true}, function (j) {
                        options = '<option value="">TODOS</option>';
                        for (var c = 0; c < j.length; c++) {
                            options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + ' - ' + j[c].codigo + '</option>';
                        }
                        $('#procedimento').html(options).show();
                        $('.carregando').hide();
                    });
                }

            }
        });
    });


</script>
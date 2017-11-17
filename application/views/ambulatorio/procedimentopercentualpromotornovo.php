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
    <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/procedimentoplano/gravarnovopromotor/<?= $procedimento_percentual_promotor_id ?>" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convênio*</label>
                            <input type="text" name="covenio" id="covenio" class="form-control" value="<?= $dados[0]->convenio; ?>" readonly />     
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Grupo*</label>
                            <input type="text" name="grupo" id="grupo" class="form-control" value="<?= $dados[0]->grupo ?>" readonly />
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Procedimento</label>
                            <input type="text" name="procedimento" id="procedimento" class="form-control" value="<?= $dados[0]->procedimento ?>" readonly />
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Promotor</label>
                            <select name="promotor" id="promotor" class="form-control" required="true">
                                <option value="">Selecione</option>
                                <? foreach ($promotors as $value) : ?>
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
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });


//    $(document).ready(function () {
//        jQuery('#form_procedimentonovopromotor').validate({
//            rules: {
//                promotor: {
//                    required: true,
//                    equalTo: "#SELECIONE"
//                },
//                valor: {
//                    required: true
//                }
//
//            },
//            messages: {
//                promotor: {
//                    required: "*",
//                    equalTo: "*"
//                },
//                valor: {
//                    required: "*"
//                }
//            }
//        });
//    });



</script>
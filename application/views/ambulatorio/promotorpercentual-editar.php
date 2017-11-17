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
    <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/procedimentoplano/gravareditarpromotorpercentual/<?= $procedimento_percentual_promotor_convenio_id ?>/<?=$dados?>" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Promotor</label>
                            <input type="text" name="promotor" id="promotor" class="form-control" value="<?= $busca[0]->nome ?>" readonly/>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" name="valor" id="valor" class="form-control" value="<?= $busca[0]->valor ?>"/>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Percentual</label>
                            <select name="percentual"  id="percentual" class="form-control">
                            <?
                            if ($busca[0]->percentual == "t") {
                                ?>
                                <option value="1"> SIM</option>
                                <option value="0"> NÃO</option>                                
                            <? } else { ?>
                                <option value="0"> NÃO</option>
                                <option value="1"> SIM</option>
                            <? } ?>

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
        $(location).attr('href', '<?= base_url(); ?>ambulatorio/procedimentoplano/procedimentopercentual');
    });

    $(function () {
        $("#accordion").accordion();
    });

</script>
<div id="page-wrapper"> <!-- Inicio da DIV content -->

    <div >
        <div class="row">
            <div class="col-lg-12"> 

            </div>
        </div>
        <div>
            <form name="form_procedimento" id="form_procedimento" action="<?= base_url() ?>ambulatorio/guia/impressaodeclaracao/<?= $paciente_id ?>/<?= $guia_id ?>/<?= $exames_id ?>" method="post">
                <div class="panel panel-default">
                    <div class="alert alert-info ">
                        Imprimir Modelo de Declaração
                    </div>
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Modelo</label>


                                    <select name="modelo" id="modelo" class="form-control" >
                                        <option value='' >Selecione</option>
                                        <? foreach ($modelos as $modelo) { ?>                                
                                            <option value='<?= $modelo->ambulatorio_modelo_declaracao_id ?>'>
                                                <?= $modelo->nome ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <p>
                                    <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>


                                    <button  class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

        </div>


        </form>
    </div>
</div>
</div> <!-- Final da DIV content -->
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });

</script>
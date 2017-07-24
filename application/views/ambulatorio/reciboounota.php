<div id="page-wrapper"> <!-- Inicio da DIV content -->

    <div id="accordion">
        <div>
            <form name="form" id="form" action="<?= base_url() ?>ambulatorio/guia/reciboounotaindicador" method="post">
                <div class="panel panel-default">
                    <div class="alert alert-info ">
                        Imprimir Recibo/Nota
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name="paciente_id" value="<?= $paciente_id ?>"/>
                        <input type="hidden" name="guia_id" value="<?= $guia_id ?>"/>
                        <input type="hidden" name="exames_id" value="<?= $exames_id ?>"/>
                        <div class="row">
                            <div class="col-lg-2">  
                                <div class="form-group">

                                    <label>Recibo/Nota</label>


                                    <select name="escolha" id="escolha" class="form-control" required>
                                        <option value='' >Selecione</option>
                                        <option value='R' >Recibo</option>
                                        <option value='N' >Nota</option>
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
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });





</script>
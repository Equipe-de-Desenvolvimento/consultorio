<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <form name="form_desconto" id="form_desconto" action="<?= base_url() ?>cadastros/convenio/gravardesconto/<?= $convenio[0]->convenio_id; ?>" method="post">



        <div class="panel panel-default ">
            <div class="alert alert-info">
                Ajuste Valor Convenio
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-5">


                        <div class="form-group">


                            <label>Convenio</label>
                            <input type="hidden" name="txtprocedimentoplanoid" value="<?= @$obj->_procedimento_convenio_id; ?>" />
                            <input type="hidden" name="convenio" id="convenio" class="texto02" value="<?= $convenio[0]->convenio_id; ?>" />
                            <input  value="<?php echo $convenio[0]->nome; ?>" class="form-control" readonly/>

                        </div>    


                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-5">


                        <div class="form-group">


                            <label>Grupo</label>
                            <select name="grupo" id="grupo" class="form-control">
                                <option value="TODOS">TODOS</option>
                                <? foreach ($grupos as $value) { ?>
                                    <option value="<?= $value->nome; ?>"><?php echo $value->nome; ?></option>
                                <? } ?>                           
                            </select>

                        </div>    


                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-5">


                        <div class="form-group">

                            <label>Ajuste CH (%)</label>
                            <input  type="text" name="ajustech" class="form-control percentual" id="ajustech" data-container="body" data-toggle="popover" data-placement="left" data-content="Campo dedicado ao ajuste CH referente aos procedimentos. Obs: Se o ajuste for negativo, digite o sinal de subtração no teclado" />
                                
                        </div>    
                        <div class="form-group">

                            <label>Ajuste Filme (%)</label>
                            <input type="text" name="ajustefilme" class="form-control percentual" id="ajustefilme"  />

                        </div>    
                        <div class="form-group">
                            <label>Ajuste Porte (%)</label>
                            <input type="text" name="ajusteporte" id="ajusteporte" class="form-control percentual"/>

                        </div>    
                        <div class="form-group">
                            <label>Ajuste Porte (%)</label>
                            <input type="text" name="ajusteporte" id="ajusteporte" class="form-control percentual"/>

                        </div>    
                        <div class="form-group">

                            <label>Ajuste UCO (%)</label>

                            <input type="text" name="ajusteuco" id="ajusteuco" class="form-control percentual"/>


                        </div>    
                        <div class="form-group">
                            <label>Desconto TOTAL (%)</label>
                            <input type="text" name="ajustetotal" id="ajustetotal" class="form-control percentual" step=0.01  />
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
<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-verificaCPF.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });
    // popover demo
    $("[data-toggle=popover]")
        .popover();

</script>
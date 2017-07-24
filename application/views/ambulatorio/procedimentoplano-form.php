<!--<link rel="stylesheet" href="<?= base_url() ?>js/chosen/chosen.css">-->
<!--<link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/style.css">-->
<link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/prism.css">
<link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/bootstrap-chosen.css">
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
    <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/procedimentoplano/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div >
                            <label>Procedimento*</label>
                            <input type="hidden" name="txtprocedimentoplanoid" value="<?= @$obj->_procedimento_convenio_id; ?>" />
                            <select name="procedimento" id="procedimento" class="chosen-select" tabindex="1">
                                <? foreach ($procedimento as $value) : ?>
                                    <option value="<?= $value->procedimento_tuss_id; ?>"<?
                                    if (@$obj->_procedimento_tuss_id == $value->procedimento_tuss_id):echo'selected';
                                    endif;
                                    ?>><?php echo $value->nome; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div >
                            <label>Convênio*</label>
                            <select name="convenio" id="convenio" class="form-control">
                                <? foreach ($convenio as $value) : ?>
                                    <option value="<?= $value->convenio_id; ?>"<?
                                    if (@$obj->_convenio_id == $value->convenio_id):echo'selected';
                                    endif;
                                    ?>><?php echo $value->nome; ?></option>
                                        <? endforeach; ?>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div >
                            <label>Quantidade de CH</label>
                            <input type="text" name="qtdech" id="qtdech" class="form-control" value="<?= @$obj->_qtdech; ?>"/>
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div >
                            <label>Valor de CH</label>
                            <input type="text" name="valorch" id="valorch"  class="form-control" value="<?= @$obj->_valorch; ?>"/>
                        </div>


                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-2">
                        <div >
                            <label>QTDE de Filme</label>
                            <input type="text" name="qtdefilme" onkeyup="multiplica()" onblur="history.go(0)" id="qtdefilme" class="form-control" value="<?= @$obj->_qtdefilme; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div >
                            <label>Valor de Filme</label>
                            <input type="text" name="valorfilme" onkeyup="multiplica()" id="valorfilme" class="form-control" value="<?= @$obj->_valorfilme; ?>" />
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div >
                            <label>QTDE de Porte</label>
                            <input type="text" name="qtdeporte"  id="qtdeporte" class="form-control" value="<?= @$obj->_qtdeporte; ?>" />
                        </div>


                    </div>
                    
                    <div class="col-lg-2">
                        <div >
                            <label>Valor de Porte</label>
                            <input type="text" name="valorporte"  id="valorporte" class="form-control" value="<?= @$obj->_valorporte; ?>" />
                        </div>


                    </div>
               
                </div>
                

                <div class="row">
                    <div class="col-lg-2">
                        <div >
                            <label>QTDE de UCO</label>
                            <input type="text" name="qtdeuco"  id="qtdeuco" class="form-control" value="<?= @$obj->_qtdeuco; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div >
                            <label>Valor de UCO</label>
                            <input type="text" name="valoruco" onkeyup="multiplica()" onblur="history.go(0)" id="valoruco" class="form-control" value="<?= @$obj->_valoruco; ?>" />
                        </div>


                    </div>
                </div>
<br>
                <div class="row">
                    <div class="col-lg-2">
                        <div >
                            <label>Valor Total</label>
                            <input type="text" name="valortotal" onkeyup="multiplica()" onblur="history.go(0)" id="valortotal" class="form-control" value="<?= @$obj->valortotal; ?>" />
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

<script type="text/javascript" src="<?= base_url() ?>js/chosen/chosen.jquery.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/chosen/docsupport/prism.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/chosen/docsupport/init.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js" type="text/javascript"></script>-->

<script type="text/javascript">
                                $('#btnVoltar').click(function () {
                                    $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
                                });

                                $(function () {
                                    $("#accordion").accordion();
                                });

                                $(document).ready(function () {

                                    function multiplica()
                                    {
                                        total = 0;
                                        numer1 = parseFloat(document.form_procedimentoplano.qtdech.value);
                                        numer2 = parseFloat(document.form_procedimentoplano.valorch.value);
                                        soma = numer1 * numer2;
                                        numer3 = parseFloat(document.form_procedimentoplano.qtdefilme.value);
                                        numer4 = parseFloat(document.form_procedimentoplano.valorfilme.value);
                                        soma2 = numer3 * numer4;
                                        numer5 = parseFloat(document.form_procedimentoplano.qtdeuco.value);
                                        numer6 = parseFloat(document.form_procedimentoplano.valoruco.value);
                                        soma3 = numer5 * numer6;
                                        numer7 = parseFloat(document.form_procedimentoplano.qtdeporte.value);
                                        numer8 = parseFloat(document.form_procedimentoplano.valorporte.value);
                                        soma4 = numer7 * numer8;
                                        total += soma + soma2 + soma3 + soma4;
                                        y = total.toFixed(2);
                                        $('#valortotal').val(y).trigger("change");
                                        //document.form_procedimentoplano.valortotal.value = total;
                                    }
                                    multiplica();


                                });

</script>
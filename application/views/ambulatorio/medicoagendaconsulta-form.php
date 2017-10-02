<div id="page-wrapper">
    <div class="alert alert-success">
        Editar/Alterar Agendas
    </div>
    <!-- Inicio da DIV content -->
    <div class="panel panel-default">
        <div class="alert alert-info">
            Opções
        </div>
        <!--<h3 class="singular"><a href="#">Bloqueio / Altera&ccedil;&otilde;s</a></h3>-->
        <div class="panel-body">
            <form name="form_medicoagenda" id="form_medicoagenda" action="<?= base_url() ?>ambulatorio/agenda/gravarmedicoconsulta" method="post">


                <div class="row">
                    <div class="col-lg-4 form-group">


                        <label>A&ccedil;&atilde;o</label>


                        <select name="txtacao" size="1" class="form-control" id="teste" required >
                            <option value="Bloquear">Bloquear</option>
                            <option value="Excluir">Excluir hor&aacute;rios</option>
                            <option value="Alterarmedico">Alterar medico</option>

                        </select>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-4 form-group">

                        <label>Medico</label>


                        <select name="medico" id="medico" class="form-control" required>
                            <option value="">Selecione</option>
                            <? foreach ($medicos as $value) : ?>
                                <option value="<?= $value->operador_id; ?>"><?php echo $value->nome; ?></option>
                            <? endforeach; ?>
                        </select>

                    </div>    
                </div>

                <!--                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label>Salas</label>
                
                
                                        <select name="sala" id="sala" class="form-control">
                                            <option value=""></option>
                <? foreach ($salas as $value) : ?>
                                                                    <option value="<?= $value->exame_sala_id; ?>"><?php echo $value->nome; ?></option>
                <? endforeach; ?>
                                        </select>
                                    </div>    
                                </div>-->

                <div class="row">
                    <div class="col-lg-2 form-group" >

                        <label>Data inicio</label>


                        <input type="text"  id="datainicio" name="datainicio" class="form-control" required/>

                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-2 form-group">
                        <label>Data fim</label>


                        <input type="text"  id="datafim" name="datafim" class="form-control" required/>

                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-2 form-group">
                        <label>Hora inicio</label>


                        <input type="text" alt="time" id="horainicio" name="horainicio" class="form-control hora" required/>

                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-2 form-group">
                        <label>Hora fim</label>
                        <input type="text" alt="time" id="horafim" name="horafim" class="form-control hora" required/>

                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-7 form-group">
                        <label>Observacao</label>


                        <textarea type="text" name="txtobservacao" cols="55" class="form-control"></textarea>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-12 form-group">
                        <br>
                        <div id="chk_desc_inss">
                            <input type="checkbox"   name="txtsegunda" /><label>Segunda</label>
                            <input type="checkbox"   name="txtterca" /><label>Terca</label>
                            <input type="checkbox"   name="txtquarta" /><label>Quarta</label>
                            <input type="checkbox"   name="txtquinta" /><label>Quinta</label>
                            <input type="checkbox"   name="txtsexta" /><label>Sexta</label>
                            <input type="checkbox"   name="txtsabado" /><label>Sabado</label>
                            <input type="checkbox"   name="txtdomingo" /><label>Domingo</label>
                        </div>

                    </div>    
                </div>


                <div class="row">
                    <div class="col-lg-3">
                        <p>
                            <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o fa-fw"></i> Enviar</button>
                            <button   class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        </p>
                        <!--<button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">

    $(function () {
        $("#datainicio").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });
    $(function () {
        $("#datafim").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(document).ready(function () {
        jQuery('#form_medicoagenda').validate({
            rules: {
                medico: {
                    required: true
                },
                datainicio: {
                    required: true
                },
                datafim: {
                    required: true
                },
                horainicio: {
                    required: true
                },
                horafim: {
                    required: true
                }
            },
            messages: {
                medico: {
                    required: "*"
                },
                datainicio: {
                    required: "*"
                },
                datafim: {
                    required: "*"
                },
                horainicio: {
                    required: "*"
                },
                horafim: {
                    required: "*"
                }
            }
        });
    });

</script>
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <!--    <div class="bt_link_voltar">
            <a href="<?= base_url() ?>ponto/horariostipo">
                Voltar
            </a>
    
        </div>-->
    <div class="panel panel-default">
        <div class="alert alert-info">Atribuir Horários a Agenda</div>
        <? if (count($horarioagenda) == 0) { ?>


            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Hey! Parece que não há horários associados a esta agenda. Que tal criar? <a href="<?= base_url() ?>ambulatorio/agenda/listarhorarioagenda/<?= $agenda_id ?>" class="alert-link">Clique aqui para criar!</a>.
            </div>

        <? } ?>

        <div class="panel-body">
            <form name="form_exame" id="form_exame" action="<?= base_url() ?>ambulatorio/exame/gravarconsulta" method="post">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">


                            <label>Nome</label>


                            <input type="text"  name="txtNome" class="form-control bestupper" value="<?= $agenda[0]->nome ?>" readonly=""/>

                        </div>    
                    </div>    
                </div> 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Data inicial</label>


                            <input type="text"  id="txtdatainicial" name="txtdatainicial" alt="date" class="form-control" />

                        </div>    
                    </div>    
                </div> 
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Data final</label>


                            <input type="text"  id="txtdatafinal" name="txtdatafinal" alt="date" class="form-control" />

                        </div>    
                    </div>    
                </div>
                <!--<div class="row">-->
                <!--<div class="col-lg-3">-->
                <!--<div class="form-group">-->
                <!--<label>Horario *</label>-->


                <input type="hidden"  id="txthorario" name="txthorario" alt="date" class="form-control"  value="<?= $agenda_id ?>"/>

                <!--</div>-->    
                <!--</div>-->    
                <!--</div>-->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Medico *</label>


                            <select name="txtmedico" id="txtsala" class="form-control">
                                <? foreach ($medico as $item) : ?>
                                    <option value="<?= $item->operador_id; ?>"><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>    
                    </div>    
                </div>   




                <!--<hr/>-->
                <div class="row">
                    <div class="col-lg-3">

                        <p>
                            <? if (count($horarioagenda) > 0) {?>
                                <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o fa-fw"></i> Enviar</button>
                                <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                            <? }else{?>
                                <button class="btn btn-outline btn-success btn-sm" disabled="" type="submit" name="btnEnviar"><i class="fa fa-floppy-o fa-fw"></i> Enviar</button>
                                <button class="btn btn-outline btn-danger btn-sm"  disabled type="reset" name="btnLimpar">Limpar</button>
                            <?} ?>
                            
                        </p>
                    </div>
                </div>
                <!--<button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>-->
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">


    $(function () {
        $("#txtdatainicial").datepicker({
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
        $("#txtdatafinal").datepicker({
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

    $(function () {
        $("#txtprocedimentolabel").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=paciente",
            minLength: 3,
            focus: function (event, ui) {
                $("#txtpacientelabel").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#txtpacientelabel").val(ui.item.value);
                $("#txtpacienteid").val(ui.item.id);
                return false;
            }
        });
    });

 
</script>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Gerar Relatorio Recomendação
            </div>
        </div>
    </div>
    <!--<h3><a href="#">Gerar relatorio Faturamento</a></h3>-->
    <div class="panel panel-default">
        <div class="alert alert-info ">
            Dados da Pesquisa
        </div>

        <?
        $empresa = $this->guia->listarempresas();
        $medicos = $this->operador_m->listarmedicos();
        $salas = $this->exame->listartodassalas();
        $convenios = $this->convenio->listarconvenionaodinheiro();
        $guia = "";
        ?>
        <div class="panel-body">

            <form method="post" action="<?= base_url() ?>ambulatorio/guia/gerarelatorioindicacaoexames" target="_blank">
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data inicio</label>


                            <input type="text" name="txtdata_inicio" id="txtdata_inicio" class="form-control" alt="date"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data fim</label>


                            <input type="text" name="txtdata_fim" id="txtdata_fim" class="form-control" alt="date"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Recomendação</label>


                            <select name="indicacao" id="indicacao" class="form-control">
                            <option value="0">TODOS</option>
                            <? foreach ($indicacao as $value) : ?>
                                <option value="<?= $value->paciente_indicacao_id; ?>" ><?php echo $value->nome; ?></option>
                            <? endforeach; ?>
                        </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="empresa" value="0"/>

                <div class="row">
                    <div class="col-lg-4">
                        <p>
                            <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>


                        </p>
                    </div>
                </div>  



            </form>
        </div>
    </div>
</div>
<!-- Final da DIV content -->
<!--<link rel="stylesheet" href="<?php base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
    $(function () {
        $("#txtdata_inicio").datepicker({
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
        $("#txtdata_fim").datepicker({
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

</script>
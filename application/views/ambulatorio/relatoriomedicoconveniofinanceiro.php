<!-- Inicio da DIV content -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Gerar Relatório Produção Médica
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

            <form method="post" action="<?= base_url() ?>ambulatorio/guia/gerarelatoriomedicoconveniofinanceiro" target="_blank">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Medico</label>


                            <select name="medicos" id="medicos" class="form-control">
                                <option value="0">TODOS</option>
                                <? foreach ($medicos as $value) : ?>
                                    <option value="<?= $value->operador_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>    
                    </div>    
                </div>    
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convenio</label>


                            <select name="convenio" id="convenio" class="form-control">
                                <option value='0' >TODOS</option>
                                <option value="" >SEM PARTICULAR</option>
                                <? foreach ($convenio as $value) : ?>
                                    <option value="<?= $value->convenio_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data inicio</label>


                            <input type="text" name="txtdata_inicio" class="form-control" id="txtdata_inicio" alt="date"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Data fim</label>


                            <input type="text" name="txtdata_fim" class="form-control" id="txtdata_fim" alt="date"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Especialidade</label>


                            <select name="grupo" id="grupo" class="form-control" >
                                <option value='0' >TODOS</option>
                                <option value='1' >SEM RM</option>
                                <? foreach ($grupos as $grupo) { ?>                                
                                    <option value='<?= $grupo->nome ?>' <?
                                    if (@$obj->_grupo == $grupo->nome):echo 'selected';
                                    endif;
                                    ?>><?= $grupo->nome ?></option>
                                        <? } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Clinica</label>


                            <select name="clinica" id="clinica" class="form-control" >
                                <option value='SIM' >SIM</option>
                                <option value='NAO' >NAO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Situação</label>

                            <select name="situacao" id="situacao" class="form-control" >
                                <option value='' >TODOS</option>
                                <option value='1'>FINALIZADO</option>
                                <option value='0' >ABERTO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Solicitante</label>


                            <select name="solicitante" id="solicitante" class="form-control" >
                                <option value='SIM' >SIM</option>
                                <option value='NAO' >NAO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Recibo</label>


                            <select name="recibo" id="recibo" class="form-control" >

                                <option value='NAO' >NÃO</option>
                                <option value='SIM' >SIM</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--<div class="row">-->
                <!--<div class="col-lg-4">-->
                <!--<div class="form-group">-->
                <!--<label>Empresa</label>-->
                <input type="hidden" name="empresa" value="0"/>



                <!--</div>-->   
                <!--</div>-->   
                <!--</div>-->   
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
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        jQuery('#form_paciente').validate({
            rules: {
                txtdata_inicio: {
                    required: true
                },
                txtdata_fim: {
                    required: true
                },
                producao: {
                    required: true
                }

            },
            messages: {
                txtdata_inicio: {
                    required: "*"
                },
                txtdata_fim: {
                    required: "*"
                },
                producao: {
                    required: "*"
                }
            }
        });
    });

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
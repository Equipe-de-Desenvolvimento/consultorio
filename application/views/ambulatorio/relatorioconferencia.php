<!-- Inicio da DIV content -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Gerar Relatório Conferência
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

            <form method="post" action="<?= base_url() ?>ambulatorio/guia/gerarelatorioexame" target="_blank">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convenio</label>


                            <select name="convenio" id="convenio" class="form-control">
                                <option value='0' >TODOS</option>
                                <option value="" >CONVENIOS</option>
                                <option value="-1" >PARTICULARES</option>
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
                            <label>Situação</label>


                            <select name="situacao_faturamento" id="grupo" class="form-control" >
                                <option value='' >TODOS</option>
                                <option value='GLOSADO' >GLOSADO</option>
                                <option value='PAGO' >PAGO</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Procedimento</label>


                            <select name="procedimentos" id="procedimentos" class="form-control" >
                                <option value='0' >TODOS</option>
                                <? foreach ($procedimentos as $value) : ?>
                                    <option value="<?= $value->procedimento_tuss_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Classificacao</label>


                            <select name="classificacao" id="classificacao" class="form-control" >
                                <option value='0' >Data</option>
                                <option value='1' >Nome</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Faturamento</label>


                            <select name="faturamento" id="faturamento" class="form-control" >
                                <option value='0' >TODOS</option>
                                <option value='t' >Faturado</option>
                                <option value='f' >Nao Faturado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Tipo</label>


                            <select name="tipo" id="tipo" class="form-control">
                                <option value='0' >TODOS</option>
                                <option value="" >CONSULTA / RETORNO</option>
                                <option value="-1" >CONSULTA / EXAMES</option>
                                <? foreach ($classificacao as $value) : ?>
                                    <option value="<?= $value->tuss_classificacao_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Ra&ccedil;a / Cor</label>


                            <select name="raca_cor" id="txtRacaCor" class="form-control">
                                <option value=0 >TODOS</option>
                                <option value=-1 >Sem o Ind&iacute;gena</option>
                                <option value=1 >Branca</option>
                                <option value=2 >Amarela</option>
                                <option value=3 >Preta</option>
                                <option value=4 >Parda</option>
                                <option value=5>Ind&iacute;gena</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Medico</label>


                            <select name="medico" id="medico" class="form-control">
                                <option value="0">TODOS</option>
                                <? foreach ($medicos as $value) : ?>
                                    <option value="<?= $value->operador_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>

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
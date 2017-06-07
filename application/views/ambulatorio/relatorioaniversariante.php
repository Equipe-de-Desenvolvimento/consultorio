<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Gerar Relatorio Aniversariantes
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

            <form method="post" action="<?= base_url() ?>ambulatorio/guia/gerarelatorioaniversariantes" target="_blank">
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Periodo Inicial</label>
                            <input type="text" name="txtdata_inicio" class="form-control" id="txtdata_inicio" alt="date" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Periodo Final</label>
                            <input type="text" name="txtdata_fim" class="form-control" id="txtdata_fim" alt="date" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="mala_direta">Mala Direta</label>
                            <input type="checkbox" name="mala_direta" class="checkbox" id="mala_direta"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Empresa</label>

                            <select name="empresa" id="empresa" class="form-control">
                                <? foreach ($empresa as $value) : ?>
                                    <option value="<?= $value->empresa_id; ?>" ><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                                <option value="0">TODOS</option>
                            </select>
                        </div>   
                    </div>   
                </div>   
                <div class="row">
                    <div class="col-lg-3">
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
        $("#accordion").accordion();
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

</script>
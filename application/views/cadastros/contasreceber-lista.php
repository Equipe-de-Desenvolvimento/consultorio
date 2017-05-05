<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?
                $classe = $this->classe->listarclasse();
                $saldo = $this->caixa->saldo();
                $empresa = $this->caixa->empresa();
                $conta = $this->forma->listarforma();
                $tipo = $this->tipo->listartipo();
                ?>
                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>cadastros/contasreceber/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="btn-info">
                                <th>Conta</th>
                                <th>Data Inicio</th>
                                <th>Data Fim</th>
                                <th>Tipo</th>
                                <th>Classe</th>
                                <th>Empresa</th>
                                <th>Observacao</th>

                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td>
                                    <select name="conta" id="conta" class="form-control">
                                        <option value="">TODAS</option>
                                        <? foreach ($conta as $value) : ?>
                                            <option value="<?= $value->forma_entradas_saida_id; ?>" <?
                                            if (@$_GET['conta'] == $value->forma_entradas_saida_id):echo 'selected';
                                            endif;
                                            ?>><?php echo $value->descricao; ?></option>
                                                <? endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <? if (isset($_GET['datainicio'])) { ?>
                                        <input type="text"  id="datainicio" alt="date" name="datainicio" class="form-control"  value="<?php echo @$_GET['datainicio']; ?>" />
                                    <? } else { ?>
            <!--                                <input type="text"  id="datainicio" alt="date" name="datainicio" class="size1"  value="<?php echo @date('01/m/Y'); ?>" /> -->
                                        <input type="text"  id="datainicio" alt="date" name="datainicio" class="form-control"  value="<?php echo @$_GET['datainicio']; ?>" />

                                    <? } ?>
                                </td>
                                <td>
                                    <? if (isset($_GET['datafim'])) { ?>
                                        <input type="text"  id="datafim" alt="date" name="datafim" class="form-control"  value="<?php echo @$_GET['datafim']; ?>" />
                                    <? } else { ?>
            <!--                                <input type="text"  id="datafim" alt="date" name="datafim" class="size1"  value="<?php echo @date('t/m/Y'); ?>" /> -->
                                        <input type="text"  id="datafim" alt="date" name="datafim" class="form-control"  value="<?php echo @$_GET['datafim']; ?>" />

                                    <? } ?>
                                </td>
                                <td>
                                    <select name="nome" id="nome" class="form-control">
                                        <option value="">TODOS</option>
                                        <? foreach ($tipo as $value) : ?>
                                            <option value="<?= $value->tipo_entradas_saida_id; ?>" <?
                                            if (@$_GET['nome'] == $value->tipo_entradas_saida_id):echo 'selected';
                                            endif;
                                            ?>><?php echo $value->descricao; ?></option>
                                                <? endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="nome_classe" id="nome_classe" class="form-control">
                                        <option value="">TODOS</option>
                                        <? foreach ($classe as $value) : ?>
                                            <option value="<?= $value->descricao; ?>" <?
                                            if (@$_GET['nome_classe'] == $value->descricao):echo 'selected';
                                            endif;
                                            ?>><?php echo $value->descricao; ?></option>
                                                <? endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="empresa" id="empresa" class="form-control">
                                        <option value="">TODOS</option>
                                        <? foreach ($empresa as $value) : ?>
                                            <option value="<?= $value->financeiro_credor_devedor_id; ?>" <?
                                            if (@$_GET['empresa'] == $value->financeiro_credor_devedor_id):echo 'selected';
                                            endif;
                                            ?>><?php echo $value->razao_social; ?></option>
                                                <? endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text"  id="obs" name="obs" class="form-control"  value="<?php echo @$_GET['obs']; ?>" />
                                </td>

                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>cadastros/contasreceber/carregar/0">
                        <i class="fa fa-plus fa-w"></i> Nova Conta
                    </a>
  
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr >
                                    <th>Credor</th>
                                    <th>Tipo</th>
                                    <th>Classe</th>
                                    <th class="text-center">Data da Conta</th>
                                    <th>Conta</th>
                                    <th>Parcela</th>
                                    <th>Valor</th>
                                    <th>Observacao</th>
                                    <th style="text-align: center;">Detalhes</th>
                                </tr>
                            </thead>
                            <?php
                $url = $this->utilitario->build_query_params(current_url(), $_GET);
                $consulta = $this->contasreceber->listar($_GET);
                $total = $consulta->count_all_results();
                $limit = 50;
                isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;
                $valortotal = 0;
                if ($total > 0) {
                    ?>
                    
                        <?php
                        $lista = $this->contasreceber->listar($_GET)->orderby('data')->limit($limit, $pagina)->get()->result();
                        $estilo_linha = "tabela_content01";
                        $dataatual = date("Y-m-d");
                        foreach ($lista as $item) {

                            $valortotal = $valortotal + $item->valor;
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <? if ($dataatual > $item->data) { ?>
                                    <td class="<?php echo $estilo_linha; ?>"><font color="red"><?= $item->razao_social; ?></td>
                                <? } else { ?>
                                    <td class="<?php echo $estilo_linha; ?>"><?= $item->razao_social; ?></td>
                                <? } ?>

                                <td class="<?php echo $estilo_linha; ?>"><?= $item->tipo; ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->classe; ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data, 8, 2) . "/" . substr($item->data, 5, 2) . "/" . substr($item->data, 0, 4); ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->conta; ?></td>
                                <td class="<?php echo $estilo_linha; ?>">
                                <?if($item->parcela != ''){
                                    echo $item->parcela, "/", $item->numero_parcela; 
                                }?>
                                </td>
                                <td class="<?php echo $estilo_linha; ?>"><?= number_format($item->valor, 2, ",", "."); ?></td>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->observacao; ?></td>

                                <td class="tabela_acoes">
                                        <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/contasreceber/carregar/<?= $item->financeiro_contasreceber_id ?>">Editar</a>
                                
                                
                                        <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoexcluir(<?= $item->financeiro_contasreceber_id ?>);" >Excluir</a>
                                
                                        <a class="btn btn-outline btn-info btn-sm" href="<?= base_url() ?>cadastros/contasreceber/carregarconfirmacao/<?= $item->financeiro_contasreceber_id ?>">Confirmar</a>
                                
                                        <!--<a class="btn btn-outline btn-warning btn-sm" href="<?= base_url() ?>cadastros/contasreceber/anexarimagemcontasareceber/<?= $item->financeiro_contasreceber_id ?>">Arquivos</a>-->
                                </td>
                            </tr>

                        
                        <?php
                    }
                }
                ?>
                            <tr>
                                <th class="tabela_footer  btn-info" colspan="9">
                                    <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>

                                </th>
                            </tr>
                            <tr>
                                <th class="tabela_footer  btn-info" colspan="9">

                                    Total de registros: <?php echo $total; ?>
                                </th>
 
                            </tr>
                        </table> 
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <table class="table table-bordered table-hover">
                <thead>
                <th>Contas</th>
                <th>Saldo</th>
                </thead>
                <?
                $estilo_linha = "warning";
                foreach ($conta as $item) {
                    ($estilo_linha == "warning") ? $estilo_linha = "success" : $estilo_linha = "warning";
                    $valor = $this->caixa->listarsomaconta($item->forma_entradas_saida_id);
                    ?>
                    <tr class="<?= $estilo_linha ?>">
                        <td><?= $item->descricao; ?></td>
                        <td><?= number_format($valor[0]->total, 2, ",", "."); ?></td>
                    </tr>
                <? } ?>

                <tfoot>
                    <tr class="info">
                        <th class="tabela_footer" colspan="2">
                            Saldo Total: <?= number_format($saldo[0]->sum, 2, ",", ".") ?>
                        </th>
                    </tr>
                </tfoot>
            </table> 
        </div>
    </div>


    <!-- Inicio da DIV content -->


</div>
 <!-- Final da DIV content -->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
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

                                    $(function () {
                                        $('#nome').change(function () {
                                            if ($(this).val()) {
                                                $('.carregando').show();
                                                $.getJSON('<?= base_url() ?>autocomplete/classeportiposaidalista', {nome: $(this).val(), ajax: true}, function (j) {
                                                    options = '<option value=""></option>';
                                                    for (var c = 0; c < j.length; c++) {
                                                        options += '<option value="' + j[c].classe + '">' + j[c].classe + '</option>';
                                                    }
                                                    $('#nome_classe').html(options).show();
                                                    $('.carregando').hide();
                                                });
                                            } else {
                                                $('#nome_classe').html('<option value="">TODOS</option>');
                                            }
                                        });
                                    });
                                    
                                     function confirmacaoexcluir(idexcluir) {
                                            swal({
                                                title: "Tem certeza?",
                                                text: "Você está prestes a excluir uma conta!",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#337ab7",
                                                confirmButtonText: "Sim, quero deletar!",
                                                cancelButtonText: "Não, cancele!",
                                                closeOnConfirm: false,
                                                closeOnCancel: false
                                            },
                                                    function (isConfirm) {
                                                        if (isConfirm) {
                                                            window.open('<?= base_url() ?>cadastros/contasreceber/excluir/' + idexcluir, '_self');
                                                        } else {
                                                            swal("Cancelado", "Você desistiu de excluir uma conta", "error");
                                                        }
                                                    });

                                        }
</script>

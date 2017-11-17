<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/indicacao/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                                   
                                <th >Nome</th>
                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td class="tabela_title">
                                    <input type="text" name="nome" class="form-control" value="<?php echo @$_GET['nome']; ?>" />
                                </td>
                                
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr>


                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/indicacao/carregarindicacao/0">
                        <i class="fa fa-plus fa-w"></i>Nova Indicação
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table class="table table-striped table-bordered table-hover">
                            <!--<thead>-->
                            <tr>
                                <th class="tabela_header">Nome</th>
                                <th class="tabela_acoes">Detalhes</th>
                            </tr>
                            <!--</thead>-->
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->indicacao->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>
                                
                                    <?php
                                    $lista = $this->indicacao->listar($_GET)->limit($limit, $pagina)->orderby('nome')->get()->result();
                                    $estilo_linha = "tabela_content01";
                                    foreach ($lista as $item) {
                                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                        ?>
                                        <tr>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                            <td class="tabela_acoes">

                                                <a class="btn btn-outline btn-info btn-sm" href="<?= base_url() ?>ambulatorio/indicacao/carregarindicacao/<?= $item->paciente_indicacao_id ?>">
                                                    Editar
                                                </a>&zwnj;&nbsp;
                                                <a class="btn btn-outline btn-danger btn-sm" href="<?= base_url() ?>ambulatorio/indicacao/excluir/<?= $item->paciente_indicacao_id ?>">
                                                    Excluir
                                                </a>
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



</div>
<!-- Final da DIV content -->
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });

</script>

<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <!--<h3 class="singular"><a href="#">Manter Modelos de Declaração</a></h3>-->
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="post" action="<?= base_url() ?>ambulatorio/modelomedicamento/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Nome</th>

                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td><input type="text" name="nome" id="" class="form-control" alt="date" value="<?php echo @$_POST['nome']; ?>" /></td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/modelomedicamento/carregarmodelomedicamento/0">
                        <i class="fa fa-plus fa-w"></i> Novo Modelo
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="tabela_header">Nome</th>
                                    <th class="tabela_header">Medico</th>
                                    <th class="tabela_acoes">Ações</th>

                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_POST);
                            $consulta = $this->modelomedicamento->listar($_POST);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_POST['per_page']) ? $pagina = $_POST['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>
                              
                                    <?php
                                    $lista = $this->modelomedicamento->listar($_POST)->orderby('nome')->limit($limit, $pagina)->get()->result();
                                    $estilo_linha = "tabela_content01";
                                    foreach ($lista as $item) {
                                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                        ?>
                                        <tr>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->medico; ?></td>

                                            <td class="tabela_acoes" width="100px;">

                                                <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>ambulatorio/modelomedicamento/carregarmodelomedicamento/<?= $item->medicamento_id ?>">
                                                    Editar
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
                                <th class="tabela_footer btn-info" colspan="9">

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

<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <!--<h3 class="singular"><a href="#">Manter Modelos de Declaração</a></h3>-->
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="post" action="<?= base_url() ?>ambulatorio/modeloatestado/pesquisar">
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
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/modeloatestado/carregarmodeloatestado/0">
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
                            $consulta = $this->modeloatestado->listar($_POST);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_POST['per_page']) ? $pagina = $_POST['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>
                                
                                    <?php
                                    $lista = $this->modeloatestado->listar($_POST)->orderby('nome')->limit($limit, $pagina)->get()->result();
                                    $estilo_linha = "tabela_content01";
                                    foreach ($lista as $item) {
                                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                        ?>
                                        <tr>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->medico; ?></td>

                                            <td class="tabela_acoes" width="100px;">

                                                <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>ambulatorio/modeloatestado/carregarmodeloatestado/<?= $item->ambulatorio_modelo_atestado_id ?>">
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
<!--<div class="content">  Inicio da DIV content 
    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>ambulatorio/modeloatestado/carregarmodeloatestado/0">
            Nova Modelo
        </a>
    </div>
    <div id="accordion">
        <h3 class="singular"><a href="#">Manter Modelos de atestados</a></h3>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="5" class="tabela_title">
                            <form method="get" action="<?= base_url() ?>ambulatorio/modeloatestado/pesquisar">
                                <input type="text" name="nome" class="texto10 bestupper" value="<?php echo @$_POST['nome']; ?>" />
                                <button type="submit" id="enviar">Pesquisar</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th class="tabela_header">Nome</th>
                        <th class="tabela_header">Medico</th>
                        <th class="tabela_header">Detalhes</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">
                            <?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>
                            Total de registros: <?php echo $total; ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>  Final da DIV content -->
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });

</script>

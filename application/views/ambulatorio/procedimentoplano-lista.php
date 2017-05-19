
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/procedimentoplano/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Plano</th>
                                <th>Procedimento</th>
                                <th>Grupo</th>
                                <th>Codigo</th>

                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td><input type="text" name="nome" class="form-control" value="<?php echo @$_GET['nome']; ?>" /></td>
                                <td><input type="text" name="procedimento" class="form-control" value="<?php echo @$_GET['procedimento']; ?>" /></td>
                                <td><input type="text" name="grupo" class="form-control" value="<?php echo @$_GET['grupo']; ?>" /></td>
                                <td><input type="text" name="codigo" class="form-control" value="<?php echo @$_GET['codigo']; ?>" /></td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/procedimentoplano/carregarprocedimentoplano/0">
                        <i class="fa fa-plus fa-w"></i>Novo Procedimento Convênio
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr >
                                    <th class="tabela_header">Plano</th>
                                    <th class="tabela_header">Procedimento</th>
                                    <th class="tabela_header">Grupo</th>
                                    <th class="tabela_header">Codigo</th>
                                    <th class="tabela_header">Valor</th>
                                    <th style="text-align: center;">Detalhes</th>
                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->procedimentoplano->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = $limite_paginacao;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                if ($limit != "todos") {
                                    $lista = $this->procedimentoplano->listar($_GET)->orderby('c.nome')->orderby('pt.grupo')->orderby('pt.nome')->limit($limit, $pagina)->get()->result();
                                } else {
                                    $lista = $this->procedimentoplano->listar($_GET)->orderby('c.nome')->orderby('pt.grupo')->orderby('pt.nome')->get()->result();
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td><?= $item->convenio; ?></td>                               
                                        <td><?= $item->procedimento; ?></td>
                                        <td><?= $item->grupo; ?></td>
                                        <td><?= $item->codigo; ?></td>
                                        <td><?= $item->valortotal; ?></td>



                                        <td class="tabela_acoes">
                                            <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoprocedimento(<?= $item->procedimento_convenio_id ?>);"
                                               href="#">
                                                Excluir
                                            </a>
                <!--                                    href="<?= base_url() ?>ambulatorio/procedimentoplano/excluir/<?= $item->procedimento_convenio_id; ?>"-->


                                            <a class="btn btn-outline btn-primary btn-sm" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/procedimentoplano/carregarprocedimentoplano/<?= $item->procedimento_convenio_id ?>');">
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



</div> <!-- Final da DIV content -->
<script type="text/javascript">
    function confirmacaoprocedimento(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a deletar um procedimento convênio!",
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
                        window.open('<?= base_url() ?>ambulatorio/procedimentoplano/excluir/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir o procedimento", "error");
                    }
                });

    }
</script>

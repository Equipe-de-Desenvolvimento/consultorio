<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?
//                $classe = $this->classe->listarclasse();
//                $saldo = $this->caixa->saldo();
//                $empresa = $this->caixa->empresa();
//                $conta = $this->forma->listarforma();
//                $tipo = $this->tipo->listartipo();
                ?>
                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>cadastros/fornecedor/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="btn-info">
                                <th>Razão Social</th>
                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td>
                                    <input type="text" name="nome" class="form-control" value="<?php echo @$_GET['nome']; ?>" />
                                </td>


                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>cadastros/fornecedor/carregarfornecedor/0">
                        <i class="fa fa-plus fa-w"></i> Novo Credor/Devedor
                    </a>

                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr >
                                    <th>Nome</th>
                                    <th>CNPJ</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th style="text-align: center;">Detalhes</th>
                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->fornecedor->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = $limite_paginacao;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                if ($limit != "todos") {
                                    $lista = $this->fornecedor->listar($_GET)->orderby('razao_social')->limit($limit, $pagina)->get()->result();
                                } else {
                                    $lista = $this->fornecedor->listar($_GET)->get()->result();
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td><?= $item->razao_social; ?></td>
                                        <td><?= $item->cnpj; ?></td>
                                        <td><?= $item->cpf; ?></td>
                                        <td><?= $item->telefone; ?></td>
                                        <td class="tabela_acoes">                                  
                                            <a  class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/fornecedor/carregarfornecedor/<?= $item->financeiro_credor_devedor_id ?>" target="_blank">Editar</a>

                                            <a  class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoexcluir(<?= $item->financeiro_credor_devedor_id ?>);">Excluir</a>
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

    <!-- Inicio da DIV content -->


</div>
<!-- Final da DIV content -->
<script type="text/javascript">

    function confirmacaoexcluir(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a excluir um credor/devedor!",
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
                        window.open('<?= base_url() ?>cadastros/fornecedor/excluir/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir um credor/devedor", "error");
                    }
                });

    }

</script>

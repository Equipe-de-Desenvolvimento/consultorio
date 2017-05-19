<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>cadastros/formapagamento/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Nome</th>

                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td><input type="text" name="nome" id="" class="form-control" alt="date" value="<?php echo @$_GET['nome']; ?>" /></td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>cadastros/formapagamento/carregarformapagamento/0">
                        <i class="fa fa-plus fa-w"></i> Nova Forma de Pagamento
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="width: 70%;" >Nome</th>

                                    <th style="text-align: center;">Detalhes</th>

                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->formapagamento->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>
                                
                                    <?php
                                    $lista = $this->formapagamento->listar($_GET)->orderby('nome')->limit($limit, $pagina)->get()->result();
                                    $estilo_linha = "tabela_content01";
                                    foreach ($lista as $item) {
                                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                        ?>
                                        <tr >
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>

                                            <td class="tabela_acoes" width="70px;">                                  
                                                <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/formapagamento/carregarformapagamento/<?= $item->forma_pagamento_id ?>">Editar</a>
                                                                            
                                                <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoexcluir(<?= $item->forma_pagamento_id ?>);">Excluir</a>
                                                                             
                                                <a class="btn btn-outline btn-success btn-sm" href="<?= base_url() ?>cadastros/formapagamento/formapagamentoparcelas/<?= $item->forma_pagamento_id ?>">Parcelas</a>
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

    function confirmacaoexcluir(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a deletar uma forma de pagamento!",
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
                        window.open('<?= base_url() ?>cadastros/formapagamento/excluir/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir uma forma de pagamento", "error");
                    }
                });

    }

</script>


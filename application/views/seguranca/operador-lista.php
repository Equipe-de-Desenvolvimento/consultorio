<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>seguranca/operador/pesquisar">
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
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>seguranca/operador/novo">
                        <i class="fa fa-plus fa-w"></i> Novo Operador
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="tabela_header">Nome</th>
                                    <th class="tabela_header">Usu&aacute;rio</th>
                                    <th class="tabela_header">Perfil</th>
                                    <th class="tabela_header">Ativo</th>
                                    <th class="tabela_header"  ><center>A&ccedil;&otilde;es</center></th>

                            </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->operador_m->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = $limite_paginacao;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                if ($limit != "todos") {
                                    $lista = $this->operador_m->listar($_GET)->orderby('ativo desc')->orderby('nomeperfil')->orderby('nome')->limit($limit, $pagina)->get()->result();
                                } else {
                                    $lista = $this->operador_m->listar($_GET)->orderby('ativo desc')->orderby('nomeperfil')->orderby('nome')->get()->result();
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->usuario; ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->nomeperfil; ?></td>
                                        <? if ($item->ativo == 't') { ?>
                                            <td class="<?php echo $estilo_linha; ?>">Ativo</td>
                                        <? } else { ?>
                                            <td class="<?php echo $estilo_linha; ?>">Não Ativo</td>
                                        <? } ?>
                                        <? if ($item->ativo == 't') { ?>
                                            <td class="tabela_acoes" style='width: 180pt;'>
                                                <p>
                                                    <a class="btn btn-outline btn-danger btn-sm" style="cursor: pointer;" onclick="confirmacaoexcluir('<?= $item->operador_id; ?>');"
                                                       >Excluir
                                                    </a>

                                                    <a class="btn btn-outline btn-primary btn-sm" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "seguranca/operador/alterar/$item->operador_id"; ?> ', '_self');">Editar
                                                    </a>
                                                    <a class="btn btn-outline btn-info btn-sm" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "seguranca/operador/anexarimagem/$item->operador_id"; ?> ', '_self');">Assinatura
                                                    </a>
                                                    <!--                                            </p>
                                                                                                        <a class="btn btn-outline btn-danger btn-sm" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "seguranca/operador/unificar/$item->operador_id"; ?> ', '_blank');">Unificar
                                                                                                        </a>-->
                                                </p>
                                            </td>
                                        <? } else { ?>
                                            <td class="<?php echo $estilo_linha; ?>" ><div class="bt_link">
                                                    <a class="btn btn-outline btn-warning btn-sm"  style="cursor: pointer;" href="<?= base_url() . "seguranca/operador/reativaroperador/$item->operador_id"; ?>"
                                                       >Reativar
                                                    </a>
                                                </div>
                <!--                                    href="<?= base_url() ?>seguranca/operador/excluirOperador/<?= $item->operador_id; ?>"-->
                                            </td>

                                        <? } ?>
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
            text: "Você está prestes a deletar um operador!",
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
                        window.open('<?= base_url() ?>seguranca/operador/excluirOperador/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir um operador", "error");
                    }
                });

    }
//    function confirmacaoativar(idexcluir) {
//        swal({
//            title: "Tem certeza?",
//            text: "Você está prestes a deletar um operador!",
//            type: "warning",
//            showCancelButton: true,
//            confirmButtonColor: "#337ab7",
//            confirmButtonText: "Sim, quero deletar!",
//            cancelButtonText: "Não, cancele!",
//            closeOnConfirm: false,
//            closeOnCancel: false
//        },
//                function (isConfirm) {
//                    if (isConfirm) {
//                        window.open('<?= base_url() ?>/' + idexcluir, '_self');
//                    } else {
//                        swal("Cancelado", "Você desistiu de excluir um operador", "error");
//                    }
//                });
//
//    }

</script>

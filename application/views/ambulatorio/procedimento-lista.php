
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/procedimento/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Nome/Grupo/Código</th>

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
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/procedimento/carregarprocedimento/0">
                        <i class="fa fa-plus fa-w"></i>Novo Procedimento
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Grupo</th>
                                    <th>Codigo</th>
                                    <th>Descri&ccedil;&atilde;o</th>
                                    <th style="text-align: center;">Detalhes</th>

                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->procedimento->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                if ($limit != "todos") {
                                    $lista = $this->procedimento->listar($_GET)->orderby('grupo')->orderby('nome')->limit($limit, $pagina)->get()->result();
                                } else {
                                    $lista = $this->procedimento->listar($_GET)->orderby('grupo')->orderby('nome')->get()->result();
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td ><?= $item->nome; ?></td>
                                        <td ><?= $item->grupo; ?></td>
                                        <td ><?= $item->codigo; ?></td>
                                        <td ><?= $item->descricao; ?></td>

                                        <td style="width: 130pt;" class="tabela_acoes">
                                            <a class="btn btn-outline btn-danger btn-sm" style="cursor: pointer;" onclick="confirmacaoprocedimento(<?=$item->procedimento_tuss_id?>);" href="#">
                                               Excluir
                                            </a>
                                            <a class="btn btn-outline btn-primary btn-sm" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "ambulatorio/procedimento/carregarprocedimento/$item->procedimento_tuss_id"; ?> ', '_blank');">Editar
                                            </a>
                                           

        <!--                                    href="<?= base_url() ?>seguranca/operador/excluirOperador/<?= $item->operador_id; ?>"-->
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
                                <th class="tabela_footer btn-outline btn-info" colspan="9">

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
              text: "Você está prestes a deletar um procedimento!",
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
                          window.open('<?= base_url() ?>ambulatorio/procedimento/excluir/' + idexcluir,'_self');
                      } else {
                          swal("Cancelado", "Você desistiu de excluir o procedimento", "error");
                      }
                  });

      }

</script>

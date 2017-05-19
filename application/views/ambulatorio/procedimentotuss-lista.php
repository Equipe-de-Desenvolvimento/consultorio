
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/procedimento/pesquisartuss">
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
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/procedimento/carregarprocedimentotuss/0">
                        <i class="fa fa-plus fa-w"></i>Novo Proc. Tuss
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr >
                                    <th>Descri&ccedil;&atilde;o</th>
                                    <th>Codigo</th>
                                    <th>Texto</th>
                                    <th style="text-align: center;">Detalhes</th>
                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->procedimento->listartuss($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                $lista = $this->procedimento->listartuss($_GET)->orderby('descricao')->limit($limit, $pagina)->get()->result();
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td ><?= $item->descricao; ?></td>
                                        <td ><?= $item->codigo; ?></td>
                                        <td ><?= $item->ans; ?></td>

                                        <td style="width: 120pt;" class="tabela_acoes" >
                                            <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>ambulatorio/procedimento/carregarprocedimentotuss/<?= $item->tuss_id ?>">Editar
                                            </a>

                                            <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoprocedimento(<?=$item->tuss_id?>);">Excluir
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
              text: "Você está prestes a deletar um procedimento TUSS!",
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
                          window.open('<?= base_url() ?>ambulatorio/procedimento/excluirprocedimentotuss/' + idexcluir,'_self');
                      } else {
                          swal("Cancelado", "Você desistiu de excluir o procedimento", "error");
                      }
                  });

      }
      
</script>

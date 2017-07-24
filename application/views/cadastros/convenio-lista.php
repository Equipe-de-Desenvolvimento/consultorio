
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>cadastros/convenio/pesquisar">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Convênio</th>

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
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>cadastros/convenio/carregar/0">
                        <i class="fa fa-plus fa-w"></i> Novo Convênio
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
                $consulta = $this->convenio->listar($_GET);
                $total = $consulta->count_all_results();
                $limit = 10;
                isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                if ($total > 0) {
                    ?>
                    
                        <?php
                        $lista = $this->convenio->listar($_GET)->limit($limit, $pagina)->orderby('nome')->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                            ?>
                            <tr>
                                <td><?= $item->nome; ?></td>
                                <td class="tabela_acoes">
                                        <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/convenio/carregar/<?= $item->convenio_id ?>">
                                            Editar
                                        </a>
                                    
                                        <a class="btn btn-outline btn-info btn-sm" href="<?= base_url() ?>cadastros/convenio/copiar/<?= $item->convenio_id ?>">
                                            Copiar
                                        </a>
                                   
                                
                                        <a class="btn btn-outline btn-success btn-sm" href="<?= base_url() ?>cadastros/convenio/desconto/<?= $item->convenio_id ?>">
                                            Ajuste (%)
                                        </a>
                                        <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoconvenio(<?=$item->convenio_id?>);" href="#">
                                            
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
    

</div> <!-- Final da DIV content -->
<script type="text/javascript">

    function confirmacaoconvenio(idexcluir) {
          swal({
              title: "Tem certeza?",
              text: "Você está prestes a deletar um convênio! Obs: Irá apagar os procedimentos associados",
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
                          window.open('<?= base_url() ?>cadastros/convenio/excluir/' + idexcluir,'_self');
                      } else {
                          swal("Cancelado", "Você desistiu de excluir o procedimento", "error");
                      }
                  });

      }

</script>

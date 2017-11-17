<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <?
        $grupo = $this->procedimento->listargrupos();
        $convenio = $this->convenio->listardados();
        ?>
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="" id="pesquisar">
                    <form method="post" action="<?= base_url() ?>ambulatorio/procedimentoplano/editarprocedimentopromotor/<?= $dados ?>">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th >Promotor</th>  
                                <th >Valor</th>
                                <th >Procedimento</th>                         
                                <th >Conv&ecirc;nio</th>
                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td class="tabela_title">
                                    <input type="text" name="promotor" class="form-control" value="<?php echo @$_POST['promotor']; ?>" />
                                </td>
                                <td class="tabela_title">
                                    <input type="text" name="valor" class="form-control" value="<?php echo @$_POST['valor']; ?>" />
                                </td>
                                <td class="tabela_title">
                                    <input type="text" name="procedimento" class="form-control" value="<?php echo @$_POST['procedimento']; ?>" />
                                </td>
                                <td class="tabela_title">
                                    <input type="text" name="convenio" class="form-control" value="<?php echo @$_POST['convenio']; ?>" />
                                </td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr>


                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/procedimentoplano/novopromotor/<?= $dados ?>">
                        <i class="fa fa-plus fa-w"></i>Novo Promotor
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table class="table table-striped table-bordered table-hover">
                            <!--<thead>-->
                            <tr>
                                <th class="tabela_title">Promotor</th>  
                                <th class="tabela_title" width="10px;" >Valor</th>
                                <th class="tabela_title" >Procedimento</th>                         
                                <th class="tabela_title" width="10px;">Conv&ecirc;nio</th>
                                <th class="tabela_acoes" width="10px;">Ações</th>
                            </tr>
                            <!--</thead>-->
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->procedimentoplano->listarpromotorpercentual($dados);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                $lista = $this->procedimentoplano->listarpromotorpercentual($dados)->orderby('o.nome')->orderby('pt.nome')->limit($limit, $pagina)->get()->result();
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->promotor; ?></td>

                                        <?php
                                        $percentual = $item->percentual;
                                        if ($percentual == "t") {
                                            ?>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->valor; ?>%</td>
                                        <? } elseif ($percentual == "f") { ?>
                                            <td class="<?php echo $estilo_linha; ?>">R$&nbsp;<?= $item->valor; ?></td>
                                        <? } ?> 
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->procedimento; ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->convenio; ?></td>
                                        <td class="tabela_acoes">
                                            <a class="btn btn-outline btn-danger btn-sm" onclick="javascript: return confirm('Deseja realmente excluir o procedimento');"
                                               href="<?= base_url() ?>ambulatorio/procedimentoplano/excluirpromotorpercentual/<?= $item->procedimento_percentual_promotor_convenio_id; ?>/<?= $dados; ?>">Excluir
                                            </a>
                                        
                                            <a class="btn btn-outline btn-info btn-sm" href="<?= base_url() ?>ambulatorio/procedimentoplano/editarpromotorpercentual/<?= $item->procedimento_percentual_promotor_convenio_id; ?>/<?= $dados; ?>">Editar
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
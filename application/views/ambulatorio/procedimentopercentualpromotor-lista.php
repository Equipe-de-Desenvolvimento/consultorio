<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <?
        $grupo = $this->procedimento->listargrupos();
        $convenio = $this->convenio->listardados();
        ?>
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/procedimentoplano/procedimentopercentualpromotor">
                        <table width="100%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Convenio</th>                        
                                <th>Grupo</th>                  
                                <th>Procedimento</th>

                                <th style="text-align: center;">Ações</th>
                            </tr> 
                            <tr class="">
                                <td class="tabela_title">
                                    <select name="convenio" id="convenio" class="form-control">
                                        <option value="">Selecione</option>
                                        <? foreach ($convenio as $value) : ?>
                                            <option value="<?= $value->convenio_id; ?>"
                                                    <? if ($value->convenio_id == @$_GET['convenio']) echo 'selected'; ?>>
                                                        <?= $value->nome; ?>
                                            </option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                                <td class="tabela_title">
                                    <select name="grupo" id="grupo" class="form-control">
                                        <option value="">Selecione</option>
                                        <? foreach ($grupo as $value) : ?>
                                            <option value="<?= $value->nome; ?>"
                                                    <? if (@$_GET['grupo'] == $value->nome) echo 'selected' ?>>
                                                        <?= $value->nome; ?>
                                            </option>
                                        <? endforeach; ?>

                                    </select>
                                </td>
                                <td class="tabela_title">
                                    <input type="text" name="procedimentolabel" id="procedimentolabel" class="form-control" value="<?php echo @$_GET['procedimentolabel']; ?>" />
                                    <input type="hidden" name="procedimento" id="procedimento" class="form-control " value="<?php echo @$_GET['procedimento']; ?>" />
                                </td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 

                        </table> 
                    </form>
                </div>
                <div class="panel-body">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/procedimentoplano/novoprocedimentopercentualpromotor">
                        <i class="fa fa-plus fa-w"></i>Novo Percentual
                    </a>
                    <div class="table-responsive" id="pesquisar">
                        <table class="table table-striped table-bordered table-hover">
                            <!--<thead>-->
                                <tr>
                                    <th>Procedimento</th>
                                    <th >Grupo</th>
                                    <!--<td class="tabela_header" width="120px;"></td>-->
                                    <th>Convenio</th>
                                    <!--<td class="tabela_header" width="120px;"></td>-->
                                    <th class="tabela_acoes">Ações</th>
                                </tr>
                            <!--</thead>-->
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->procedimentoplano->listarprocedimentogrupopromotor($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>
                                
                                    <?php
                                    $lista = $this->procedimentoplano->listarprocedimentogrupopromotor($_GET)->orderby('pt.grupo')->orderby('pt.nome')->limit($limit, $pagina)->get()->result();
//                        echo '<pre>';
//                        var_dump($lista);
//                        die;
                                    $estilo_linha = "tabela_content01";
                                    foreach ($lista as $item) {
                                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                        ?>
                                        <tr>
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->procedimento; ?></td>                               
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->grupo; ?></td> 
                                            <td class="<?php echo $estilo_linha; ?>"><?= $item->convenio; ?></td>
                                            <!--<td class="<?php echo $estilo_linha; ?>"></td>-->
                                            <td class="tabela_acoes" width="100px;">
                                                <a  class="btn btn-outline btn-danger btn-sm" onclick="javascript: return confirm('Deseja realmente excluir o procedimento');"
                                                   href="<?= base_url() ?>ambulatorio/procedimentoplano/excluirpercentualpromotorgeral/<?= $item->procedimento_percentual_promotor_id; ?>">Excluir&nbsp;
                                                </a>
                                                <a  class="btn btn-outline btn-info btn-sm" 
                                                    href="<?= base_url() ?>ambulatorio/procedimentoplano/editarprocedimentopromotor/<?= $item->procedimento_percentual_promotor_id; ?>">Editar
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

//    $(function () {
//        $("#accordion").accordion();
//    });

    $(function () {
        $("#procedimento").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=listarprocedimentoautocomplete",
            minLength: 3,
            focus: function (event, ui) {
                $("#procedimento").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#procedimento").val(ui.item.value);
                return false;
            }
        });
    });
    
    var procedimento = {
        url: "<?= base_url() ?>index.php?c=autocomplete&m=listarprocedimentoautocomplete",
        getValue: "value",
        list: {
            onSelectItemEvent: function () {
                var procedimento_id = $("#procedimentolabel").getSelectedItemData().id;

                $("#procedimento").val(procedimento_id).trigger("change");
                
            },
            match: {
                enabled: true
            },
            showAnimation: {
                type: "fade", //normal|slide|fade
                time: 200,
                callback: function () {}
            },
            hideAnimation: {
                type: "slide", //normal|slide|fade
                time: 200,
                callback: function () {}
            },
            maxNumberOfElements: 20,
        },
        theme: "bootstrap"
    };

    $("#procedimentolabel").easyAutocomplete(procedimento);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
    
    
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

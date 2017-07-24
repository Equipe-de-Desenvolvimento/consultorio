<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <!--<h3 class="singular"><a href="#">Manter Modelos de Declaração</a></h3>-->
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="post" action="<?= base_url() ?>ambulatorio/modelomedicamento/pesquisarunidade">
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
                    <button class="btn btn-outline btn-danger"  onclick="criar();">
                        <i class="fa fa-plus fa-w"></i> Nova Unidade
                    </button>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="tabela_header">Nome</th>
                                    <!--<th class="tabela_header">Medico</th>-->
                                    <th class="tabela_acoes">Ações</th>

                                </tr>
                            </thead>
                            <?php
                    $url      = $this->utilitario->build_query_params(current_url(), $_POST);
                    $consulta = $this->modelomedicamento->listarunidade($_POST);
                    $total    = $consulta->count_all_results();
                    $limit    = 10;
                    isset ($_POST['per_page']) ? $pagina = $_POST['per_page'] : $pagina = 0;

                    if ($total > 0) {
                ?>
              
                    <?php
                        $lista = $this->modelomedicamento->listarunidade($_POST)->orderby('descricao')->limit($limit, $pagina)->get()->result();
                        $estilo_linha = "tabela_content01";
                        foreach ($lista as $item) {
                            ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                     ?>
                            <tr>
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->descricao; ?></td>

                                <td class="tabela_acoes" width="70px;">                                  
                                    <button class="btn btn-outline btn-primary btn-sm" onclick="editar(<?= $item->unidade_id ?>, '<?= $item->descricao ?>');" >Editar</button>
                                                          
                                    <a class="btn btn-outline btn-danger btn-sm" onclick="javascript: return confirm('Deseja realmente exlcuir esse Unidade?');" 
                                       href="<?= base_url() ?>ambulatorio/modelomedicamento/excluirunidade/<?= $item->unidade_id ?>">Excluir</a>
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

        function criar() {
        swal({
            title: "Criar Nova Unidade de Medicamento!",
            text: "Escreva o nome da Unidade de Medicamento:",
            type: "input",
            imageUrl: "<?= base_url() ?>img/medicamento.png",
            showCancelButton: true,
            cancelButtonText: "Cancele!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            animation: "slide-from-top",
//            inputValue: 'teste',
            inputPlaceholder: "Digite aqui!"
        },
                function (inputValue) {
                    if (inputValue === false)
                        return false;

                    if (inputValue === "") {
                        swal.showInputError("Você precisa digitar o tipo de unidade!");
                        return false
                    }


                    jQuery.ajax({
                        type: "POST",
                        url: "<?= base_url(); ?>ambulatorio/modelomedicamento/gravarunidade",
                        data: {
                            txtDescricao: inputValue,
                            txtunidadeid: ''
                        },
                        success: function () {
//                            swal("Bom trabalho!", "Agenda: " + inputValue + ' criada com sucesso', "success");
                            swal({
                                title: "Bom trabalho!",
                                text: 'Unidade: '  + inputValue +  ' criada com sucesso!',
                                type: "success",
//                                showCancelButton: true,
                                confirmButtonColor: "#337ab7",
                                confirmButtonText: "OK!",
//                                cancelButtonText: "No, cancel plx!",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            location.reload();
                                        }
                                    });
                            
                        }
                    });
                });


    }
    
        function editar(unidade_id, unidade_nome) {
        swal({
            title: "Editar Unidade de Medicamento!",
            text: "Edite a Unidade de Medicamento:",
            type: "input",
            imageUrl: "<?= base_url() ?>img/medicamento.png",
            showCancelButton: true,
            cancelButtonText: "Cancele!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            animation: "slide-from-top",
            inputValue: unidade_nome,
            inputPlaceholder: "Digite aqui!"
        },
                function (inputValue) {
                    if (inputValue === false)
                        return false;

                    if (inputValue === "") {
                        swal.showInputError("Você precisa digitar o tipo de unidade!");
                        return false
                    }


                    jQuery.ajax({
                        type: "POST",
                        url: "<?= base_url(); ?>ambulatorio/modelomedicamento/gravarunidade",
                        data: {
                            txtDescricao: inputValue,
                            txtunidadeid: unidade_id
                        },
                        success: function () {
//                            swal("Bom trabalho!", "Agenda: " + inputValue + ' criada com sucesso', "success");
                            swal({
                                title: "Bom trabalho!",
                                text: 'Unidade: '  + inputValue +  ' editada com sucesso!',
                                type: "success",
//                                showCancelButton: true,
                                confirmButtonColor: "#337ab7",
                                confirmButtonText: "OK!",
//                                cancelButtonText: "No, cancel plx!",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            location.reload();
                                        }
                                    });
                            
                        }
                    });
                });


    }

</script>

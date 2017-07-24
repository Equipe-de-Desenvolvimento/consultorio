
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>cadastros/tipo/pesquisar">
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
                    <button class="btn btn-outline btn-danger"  onclick="criar();">
                        <i class="fa fa-plus fa-w"></i> Novo Tipo Entrada/saida
                    </button>
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
                            $consulta = $this->tipo->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                $lista = $this->tipo->listar($_GET)->limit($limit, $pagina)->orderby("descricao")->get()->result();
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->descricao; ?></td>

                                        <td class="tabela_acoes" width="70px;">                                  
                                            <!--<a  class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/tipo/carregartipo/<?= $item->tipo_entradas_saida_id ?>">Editar</a>-->
                                            <button class="btn btn-outline btn-primary btn-sm" onclick="editar(<?= $item->tipo_entradas_saida_id ?>, '<?= $item->descricao ?>');" >Editar</button>
                                            <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoexcluir(<?= $item->tipo_entradas_saida_id ?>);">Excluir</a>
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
            text: "Você está prestes a deletar um tipo!",
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
                        window.open('<?= base_url() ?>cadastros/tipo/excluir/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir o tipo", "error");
                    }
                });

    }
    
    
    
        function criar() {
        swal({
            title: "Criar Novo tipo!",
            text: "Escreva o nome do tipo:",
            type: "input",
            imageUrl: "<?= base_url() ?>img/money.png",
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
                        swal.showInputError("Você precisa digitar o nome do tipo!");
                        return false
                    }


                    jQuery.ajax({
                        type: "POST",
                        url: "<?= base_url(); ?>cadastros/tipo/gravar",
                        data: {
                            txtNome: inputValue,
                            txtcadastrostipoid: ''
                        },
                        success: function () {
//                            swal("Bom trabalho!", "Agenda: " + inputValue + ' criada com sucesso', "success");
                            swal({
                                title: "Bom trabalho!",
                                text: 'Tipo: '  + inputValue +  ' criado com sucesso!',
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
    
        function editar(id, descricao) {
        swal({
            title: "Editar tipo entradas/saidas!",
            text: "Edite o tipo entradas/saidas:",
            type: "input",
            imageUrl: "<?= base_url() ?>img/money.png",
            showCancelButton: true,
            cancelButtonText: "Cancele!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            animation: "slide-from-top",
            inputValue: descricao,
            inputPlaceholder: "Digite aqui!"
        },
                function (inputValue) {
                    if (inputValue === false)
                        return false;

                    if (inputValue === "") {
                        swal.showInputError("Você precisa digitar o nome do tipo!");
                        return false
                    }


                    jQuery.ajax({
                        type: "POST",
                        url: "<?= base_url(); ?>cadastros/tipo/gravar",
                        data: {
                            txtNome: inputValue,
                            txtcadastrostipoid: id
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

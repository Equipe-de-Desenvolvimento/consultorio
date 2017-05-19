<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?= base_url() ?>ambulatorio/agenda/pesquisar">
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
                    <button class="btn btn-outline btn-danger" onclick="criar_agenda();" >
                        <i class="fa fa-plus fa-w"></i> Nova Agenda
                    </button>
                    <div class="table-responsive" id="pesquisar">
                        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="tabela_header">Nome</th>
                                    <!--<th class="tabela_header">Tipo</th>-->
                                    <th class="text-center" colspan="3">A&ccedil;&otilde;es</th>

                                </tr>
                            </thead>
                            <?php
                            $url = $this->utilitario->build_query_params(current_url(), $_GET);
                            $consulta = $this->agenda->listar($_GET);
                            $total = $consulta->count_all_results();
                            $limit = 10;
                            isset($_GET['per_page']) ? $pagina = $_GET['per_page'] : $pagina = 0;

                            if ($total > 0) {
                                ?>

                                <?php
                                if ($limit != "todos") {
                                    $lista = $this->agenda->listar($_GET)->orderby('nome')->limit($limit, $pagina)->get()->result();
                                } else {
                                    $lista = $this->agenda->listar($_GET)->orderby('nome')->get()->result();
                                }
                                $estilo_linha = "tabela_content01";
                                foreach ($lista as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>
                                    <tr>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->nome; ?></td>
                                        <!--<td class="<?php echo $estilo_linha; ?>"><?= $item->tipo; ?></td>-->



                                        <td class="tabela_acoes" style="width: 300pt;">
                                            <p>
                                                <a class="btn btn-danger btn-outline btn-sm" href="<?= base_url() ?>ambulatorio/agenda/carregarexclusao/<?= $item->agenda_id ?>">
                                                    Excluir
                                                </a>


                                                <a class="btn btn-outline btn-primary  btn-sm" href="<?= base_url() ?>ambulatorio/exame/novoagendaconsulta/<?= $item->agenda_id ?>" target="_self">
                                                    Consolidar Agenda
                                                </a>

                                                <? if ($item->tipo == "Fixo") { ?>
                                                    <a class="btn btn-outline btn-info  btn-sm" href="<?= base_url() ?>ambulatorio/agenda/listarhorarioagenda/<?= $item->agenda_id ?>" target="_self">
                                                        Horários
                                                    </a>
                                                <? } ?>
                                            </p>
                                        </td>

                                        </td>
                                    </tr>


                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <th class="tabela_footer btn-info" colspan="9">
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
<?php
//Utilitario::pmf_mensagem($message);
//unset($message);
?>
<!--<div class="content">  Inicio da DIV content 
    <div class="bt_link_new">
        <a href="<?php echo base_url() ?>">
            Novo Horario
        </a>
    </div>
    <div id="accordion">
        <h3 class="singular"><a href="#">Manter Agenda</a></h3>
        <div>
            <table>
                

                <tfoot>
                    <tr>
                        <th class="tabela_footer" colspan="6">
<?php $this->utilitario->paginacao($url, $total, $pagina, $limit); ?>
                            Total de registros: <?php echo $total; ?>
                            <div style="display: inline">
                                <span style="margin-left: 15px; color: white; font-weight: bolder;"> Limite: </span>
                                <select style="width: 50px">
                                    <option onclick="javascript:window.location.href = ('<?= base_url() ?>ambulatorio/agenda/pesquisar/10');" <?
if ($limit == 10) {
    echo "selected";
}
?>> 10 </option>
                                    <option onclick="javascript:window.location.href = ('<?= base_url() ?>ambulatorio/agenda/pesquisar/50');" <?
if ($limit == 50) {
    echo "selected";
}
?>> 50 </option>
                                    <option onclick="javascript:window.location.href = ('<?= base_url() ?>ambulatorio/agenda/pesquisar/100');" <?
if ($limit == 100) {
    echo "selected";
}
?>> 100 </option>
                                    <option onclick="javascript:window.location.href = ('<?= base_url() ?>ambulatorio/agenda/pesquisar/todos');" <?
if ($limit == "todos") {
    echo "selected";
}
?>> Todos </option>
                                </select>
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>  Final da DIV content -->
<script type="text/javascript">

    function confirmacaoexcluir(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a deletar um horário de agenda!",
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
                        window.open('<?= base_url() ?>ambulatorio/agenda/excluir/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir um horário de agenda", "error");
                    }
                });

    }

    function criar_agenda() {
        swal({
            title: "Criar Nova Agenda!",
            text: "Escreva o nome da agenda:",
            type: "input",
            imageUrl: "<?= base_url() ?>img/agenda.png",
            showCancelButton: true,
            cancelButtonText: "Cancele!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            animation: "slide-from-top",
            inputPlaceholder: "Digite aqui!"
        },
                function (inputValue) {
                    if (inputValue === false)
                        return false;

                    if (inputValue === "") {
                        swal.showInputError("Você precisa digitar o nome da agenda!");
                        return false
                    }


                    jQuery.ajax({
                        type: "POST",
                        url: "<?= base_url(); ?>ambulatorio/agenda/gravar",
                        data: {
                            txtNome: inputValue
                        },
                        success: function () {
//                            swal("Bom trabalho!", "Agenda: " + inputValue + ' criada com sucesso', "success");
                            swal({
                                title: "Bom trabalho!",
                                text: 'Agenda: '  + inputValue +  ' criada com sucesso!',
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

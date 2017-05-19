<?php
//Utilitario::pmf_mensagem($message);
//unset($message);
?>
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div>

    </div>
    <div class="panel panel-default">
        <div class="alert alert-info">Manter Horario Fixo</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/agenda/novohorarioagenda/<?= $agenda; ?>">
                        <i class="fa fa-plus fa-w"></i> Novo Horario
                    </a>


                    <a class="btn btn-outline btn-primary" href="<?php echo base_url() ?>ambulatorio/exame/novoagendaconsulta/<?= $agenda; ?>">
                        <i class="fa fa-plus fa-w"></i> Consolidar Agenda
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="tabela_header">Data</th>
                            <th class="tabela_header">Entrada </th>
                            <th class="tabela_header">Sa&iacute;da </th>
                            <th class="tabela_header">Inicio intervalo</th>
                            <th class="tabela_header">Fim do intervalo</th>
                            <th class="tabela_header">Tempo consulta</th>
                            <th class="tabela_header">Obs</th>
                            <!--<th class="tabela_header" >Empresa</th>-->
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>


                    <?php
                    $estilo_linha = "tabela_content01";
                    foreach ($lista as $item) {
                        ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                        ?>
                        <tr>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->dia; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->horaentrada1; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->horasaida1; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->intervaloinicio; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->intervalofim; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->tempoconsulta; ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->observacoes; ?></td>
                            <!--<td class="<?php // echo $estilo_linha; ?>"><?= $item->empresa; ?></td>-->



                            <td class="text-center" >
                                <a class="btn btn-outline btn-danger btn-sm" href="<?= base_url() ?>ambulatorio/agenda/carregarexclusaohorario/<?= $item->horarioagenda_id; ?>/<?= $agenda; ?>">
                                    Excluir
                                </a>
                            </td>
                        </tr>


                        <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div> <!-- Final da DIV content -->
<script type="text/javascript">

//    function confirmacaoexcluir(idexcluir, agenda) {
//        swal({
//            title: "Tem certeza?",
//            text: "Você está prestes a excluir o horario fixo!",
//            type: "warning",
//            showCancelButton: true,
//            confirmButtonColor: "#337ab7",
//            cancelButtonColor: "#337ab7",
//            confirmButtonText: "Sim, quero deletar!",
//            cancelButtonText: "Não, cancele!",
//            closeOnConfirm: false,
//            closeOnCancel: false
//        },
//                function (isConfirm) {
//                    if (isConfirm) {
//                        window.open('<?= base_url() ?>ambulatorio/agenda/excluirhorarioagenda/' + idexcluir + '/' + agenda, '_self');
//                    } else {
//                        swal("Cancelado", "Você desistiu de excluir excluir o horario fixo", "error");
//                    }
//                });
//
//    }
</script>

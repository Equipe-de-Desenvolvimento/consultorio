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
            <a class="btn btn-outline btn-danger" href="<?php echo base_url() ?>ambulatorio/agenda/novohorarioagenda/<?= $agenda; ?>">
                <i class="fa fa-plus fa-w"></i>Novo Horario
            </a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="tabela_header">Data</th>
                            <th class="tabela_header">Entrada 1</th>
                            <th class="tabela_header">Sa&iacute;da 1</th>
                            <th class="tabela_header">Inicio intervalo</th>
                            <th class="tabela_header">Fim do intervalo</th>
                            <th class="tabela_header">Tempo consulta</th>
                            <th class="tabela_header">Obs</th>
                            <th class="tabela_header" >Empresa</th>
                            <th class="tabela_header">Ações</th>
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
                                <td class="<?php echo $estilo_linha; ?>"><?= $item->empresa; ?></td>



                                <td class="<?php echo $estilo_linha; ?>" width="100px;">
                                    <a class="btn btn-outline btn-danger btn-sm" onclick="confirmacaoexcluir(<?= $item->horarioagenda_id; ?>);">
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

     function confirmacaoexcluir(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a excluir o horario fixo!",
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
                        window.open('<?= base_url() ?>ambulatorio/agenda/excluirhorarioagenda/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de excluir excluir o horario fixo", "error");
                    }
                });

    }
</script>

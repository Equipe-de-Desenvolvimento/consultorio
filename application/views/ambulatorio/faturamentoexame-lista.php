
<div class="content"> <!-- Inicio da DIV content -->
    <div id="page-wrapper">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />
                    <? $tipoempresa = ""; ?>

                    <table class="table table-striped table-hover">
                        <thead>

                            <? if (count($empresa) > 0) { ?>
                                <tr>
                                    <th colspan="9"><?= $empresa[0]->razao_social; ?></th>
                                </tr>
                                <?
                                $tipoempresa = $empresa[0]->razao_social;
                            } else {
                                ?>
                                <tr>
                                    <th colspan="9">TODAS AS CLINICAS</th>
                                </tr>
                                <?
                                $tipoempresa = 'TODAS';
                            }
                            ?>
                            <tr>
                                <th colspan="9">FATURAMENTO POR PER&Iacute;ODO DE COMPET&Ecirc;NCIA</th>
                            </tr>
<!--                            <tr>
                                <th  colspan="9">&nbsp;</th>
                            </tr>-->
                            <tr>
                                <th colspan="9">EMPRESA: <?= $tipoempresa ?></th>
                            </tr>

                            <? if ($convenio == "0") { ?>
                                <tr>
                                    <th colspan="9">CONVENIO:TODOS OS CONVENIOS</th>
                                </tr>
                            <? } elseif ($convenio == "-1") { ?>
                                <tr>
                                    <th colspan="9">CONVENIO:PARTICULARES</th>
                                </tr>
                            <? } elseif ($convenio == "") { ?>
                                <tr>
                                    <th colspan="9">CONVENIO: CONVENIOS</th>
                                </tr>
                            <? } else { ?>
                                <tr>
                                    <th colspan="9">CONVENIO: <?= $convenios[0]->nome; ?></th>
                                </tr>
                            <? } ?>

                            <tr>
                                <th colspan="9">PERIODO: <?= str_replace("-", "/", date("d-m-Y", strtotime($txtdata_inicio))); ?> ate <?= str_replace("-", "/", date("d-m-Y", strtotime($txtdata_fim))); ?></th>
                            </tr>
<!--                            <tr>
                                <th colspan="9">&nbsp;</th>
                            </tr>-->

                        <thead>
                            <tr>
                                <th >Guia</th>
                                <!--<th >Autoriza&ccedil;&atilde;o</th>-->
                                <th >Procedimento</th>
                                <th >Convenio
                                <!--<th >Codigo</th>-->
                                <th >Medico</th>
                                <th>Data</th>
                                <th >Nome</th>
                                <!--<th>Obs.</th>-->
                                <th class="tabela_acoes">Valor Fatur.</th>

                                <th colspan="3"><center>A&ccedil;&otilde;es</center></th>
                        </tr>
                        <tr>
                            <th  colspan="9">&nbsp;</th>
                        </tr>
                        </thead>
                        <?php
                        $financeiro = 'f';
                        $valortotal = 0;
                        $faturado = 0;
                        $pendente = 0;
                        $guia = "";
                        $total = count($listar);
//                $consulta = $this->exame->listarguiafaturamento($_GET);
//                $total = $consulta->count_all_results();
                        if (count($listar) > 0) {
                            ?>
                            
                                <?php
                                foreach ($listar as $item) {
                                    $valortotal = $valortotal + $item->valortotal;
                                    $guia = $item->ambulatorio_guia_id;
                                    if ($item->financeiro == 't') {
                                        $financeiro = 't';
                                    }
                                    ?>
                                    <tr>
                                        <td ><a  style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/guia/impressaoguiaconsultaspsadt/<?= $item->ambulatorio_guia_id; ?>');">
                                                <?= $item->ambulatorio_guia_id ?>
                                            </a></td>
                                        <!--<td ><?= $item->autorizacao; ?></td>-->
                                        <td ><a class="text-info" style="cursor: pointer;" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturamentodetalhes/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=800,height=700');"><?= substr($item->procedimento, 0, 16) . " " . $item->numero_sessao; ?></a></td>
                                        <td ><div style="margin-left:8pt;"><?= $item->nome; ?></div></td>
                                        <!--<td ><?= $item->codigo; ?></td>-->
                                        <td >
                                            <? if (count($item->medico) > 0) { ?>
                                            <span style="cursor: pointer" class="text-danger" title="<? echo $item->medico; ?>"><font><? echo substr($item->medico, 0, 10); ?>(...)</span>
                                                <?
                                            } else {
                                                echo $item->medico;
                                            }
                                            ?>
                                        </td>
                                        <td ><?= substr($item->data_criacao, 8, 2) . "/" . substr($item->data_criacao, 5, 2) . "/" . substr($item->data_criacao, 0, 4); ?></td>
                                        <? if ($item->faturado == "t") { ?>
                                            <td>
                                                <font class="text-success"><? echo $item->paciente; ?>

                                            </td>
                                            <?
                                        } else {
                                            ?>
                                            <td>
                                                <font class="text-danger"><? echo $item->paciente; ?>

                                            </td>
                                        <? } ?>

<!--                                        <td >
                                            <div class="observacao">
                                                <a onclick="javascript:window.open('<?= base_url() . "ambulatorio/exame/alterarobservacaofaturar/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,\n\width=500,height=230');">
                                                    =><?= $item->observacao_faturamento; ?>
                                                </a>
                                            </div>
                                        </td>-->
                                        <td class="tabela_acoes" ><?= number_format($item->valortotal, 2, ",", "."); ?></td>
                                        <td class="tabela_acoes">
                                            <p>
                                        <?
                                        if ($item->faturado != "t") {
                                            $faturado = 1;
                                            ?>
                                           
                                                    <a class="btn btn-outline btn-success btn-sm" onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarconvenio/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=250');">Faturar
                                                    </a>
                                        <? } else { ?>
                                                <span class="text-success"> Faturado&nbsp;</span>
                                        <? }
                                        ?>
                                       
                                          
                                            <a class="btn btn-outline btn-info btn-sm" style="" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exame/faturarguia/<?= $item->ambulatorio_guia_id ?>/<?= $item->paciente_id ?>');" >
                                                    Faturar guia
                                                </a>
                                            </p>
                                        </td>
<!--
                                        <td ><div class="bt_link">
                                                <? if ($item->faturado == "t") { ?>

                                                    <? if ($item->situacao_faturamento == "") { ?>
                                                        <a onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarconveniostatus/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=250');">
                                                            Situação
                                                        </a>
                                                    <? } ?>
                                                    <? if ($item->situacao_faturamento == "GLOSADO") { ?>       
                                                        <a onclick="javascript:window.open('<?= base_url() . "ambulatorio/guia/faturarconveniostatus/" . $item->agenda_exames_id; ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=600,height=250');">
                                                            Glosado
                                                        </a>
                                                    <? } ?> 
                                                    <? if ($item->situacao_faturamento == "PAGO") { ?>        
                                                        Pago
                                                    <? } ?>

                                                <? } else { ?>   
                                                    Situação
                                                <? }
                                                ?>
                                            </div>
                                        </td>-->


                                    </tr>

                               
                                <?php
                            }
                        }
                        ?>

                        <tfoot>
                            <tr>
                                <th colspan="2" >
                                    Registros: <?php echo $total; ?>
                                </th>
                                <th colspan="3" >
                                    Valor Total: <?php echo number_format($valortotal, 2, ',', '.'); ?>
                                </th>
                                <? if ($financeiro == 't') { ?>
                                    <td  style="color:green;"><div class="bt_link">Financeiro</div></td>
                                    <?
                                    ?>
                                <? } elseif ($faturado == 0 && $convenios != 0) { ?>
                            <form name="form_caixa" id="form_caixa" action="<?= base_url() ?>ambulatorio/exame/fecharfinanceiro" method="post">
                                <input type="hidden" class="texto3" name="dinheiro" value="<?= number_format($valortotal, 2, ',', '.'); ?>" readonly/>
                                <input type="hidden" class="texto3" name="relacao" value="<?= $convenios[0]->credor_devedor_id; ?>"/>
                                <input type="hidden" class="texto3" name="conta" value="<?= $convenios[0]->conta_id; ?>"/>
                                <input type="hidden" class="texto3" name="data1" value="<?= $txtdata_inicio; ?>"/>
                                <input type="hidden" class="texto3" name="data2" value="<?= $txtdata_fim; ?>"/>
                                <input type="hidden" class="texto3" name="convenio" value="<?= $convenio; ?>"/>
                                <th colspan="3" align="center"><center>
                                    <button type="submit" name="btnEnviar">Financeiro</button></center></th>
                            </form>
                        <? } else { ?>
                            <th colspan="6" >PENDENTE DE FATURAMENTO
                            </th>
                        <? } ?>
                        </tr>
                        </tfoot>

                    </table>
                    <br>
                    <table border="1">
                        <tr>
                            <td bgcolor="c60000" width="4px;"></td>
                            <td >&nbsp;Em Aberto</td>
                            <td bgcolor="green" width="4px;"></td>
                            <td >&nbsp;Faturado</td>
                        </tr>
                    </table>
                </div>

            </div> <!-- Final da DIV content -->
        </div> <!-- Final da DIV content -->
    </div> <!-- Final da DIV content -->
</div> <!-- Final da DIV content -->
<style>
    .observacao{
        max-height: 50pt;
        max-width: 170px;

        word-wrap: break-word;
        overflow-y: auto;
    }
</style>
<script type="text/javascript" src="<?= base_url() ?>js/scripts.js" ></script>
<script type="text/javascript">


</script>


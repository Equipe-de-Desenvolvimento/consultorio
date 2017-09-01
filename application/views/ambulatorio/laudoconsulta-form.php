<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="STG SAUDE">
    <title>Atendimento Médico</title>
    <!--CSS PADRAO DO BOOTSTRAP COM ALGUMAS ALTERAÇÕES DO TEMA-->
    <link href="<?= base_url() ?>bootstrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/dist/css/sb-admin-2.css" rel="stylesheet" />
    <!--BIBLIOTECA RESPONSAVEL PELOS ICONES-->
    <link href="<?= base_url() ?>bootstrap/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!--DEFINE TAMANHO MAXIMO DOS CAMPOS-->
    <link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />
    <!--AUTOCOMPLETE NOVO-->
    <link href="<?= base_url() ?>bootstrap/vendor/autocomplete/easy-autocomplete.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>bootstrap/vendor/autocomplete/easy-autocomplete.themes.css" rel="stylesheet" type="text/css" />
    <!--CSS DO ALERTA BONITINHO-->
    <link href="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
    <!--<link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/prism.css">-->
    <!--<link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/bootstrap-chosen.css">-->


    <link href="<?= base_url() ?>bootstrap/vendor/clock/compiled/flipclock.css" rel="stylesheet" />
</head>
<form name="form_laudo" id="form_laudo" action="<?= base_url() ?>ambulatorio/laudo/gravaranaminese/<?= $ambulatorio_laudo_id ?>/<?= $exame_id ?>//<?= $procedimento_tuss_id ?>" method="post">
    <div class="container-fluid">

        <?
        $dataFuturo = date("Y-m-d");
        $dataAtual = @$obj->_nascimento;
        $date_time = new DateTime($dataAtual);
        $diff = $date_time->diff(new DateTime($dataFuturo));
        $teste = $diff->format('%Ya %mm %dd');
        ?>


        <div class="row">
            <div class="col-lg-12"> 
                <div class="alert alert-success ">
                    Atendimento Médico
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Dados do Paciente
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" style="max-height: 200px;">
                            <table class="table" > 
                                <input type="hidden" name="guia_id" id="guia_id" class="texto01"  value="<?= @$obj->_guia_id; ?>"/>
                                <tr>
                                    <td>Paciente: <?= @$obj->_nome ?></td>
                                    <td >Exame: <?= @$obj->_procedimento ?></td>
                                    <td>Solicitante: <?= @$obj->_solicitante ?></td>
                                    <td rowspan="3">
                                        <? if (file_exists("./upload/webcam/pacientes/" . @$obj->_paciente_id . ".jpg")) { ?>
                                            <img class=" img-rounded" src="<?= base_url() ?>upload/webcam/pacientes/<?= @$obj->_paciente_id ?>.jpg" width="100" height="120" />  
                                        <? } else { ?>
                                            <!--<img src="<?= base_url() ?>upload/webcam/pacientes/<?= @$obj->_paciente_id ?>.jpg" width="100" height="120" />-->
                                        <? }
                                        ?> 

                                    </td>
                                </tr>
                                <tr><td>Idade: <?= $teste ?></td>
                                    <td>Nascimento:<?= substr(@$obj->_nascimento, 8, 2) . "/" . substr(@$obj->_nascimento, 5, 2) . "/" . substr(@$obj->_nascimento, 0, 4); ?></td>
                                    <td>Sala:<?= @$obj->_sala ?></td>
                                </tr>
                                <tr><td>Sexo: <?= @$obj->_sexo ?></td>
                                    <td>Convenio:<?= @$obj->_convenio; ?></td>
                                    <td>Telefone: <?= @$obj->_telefone ?></td>
                                </tr>
    <!--                            <tr>
                                    <td>Sexo: <?= @$obj->_sexo ?></td>
                                    <td>Convenio:<?= @$obj->_convenio; ?></td>
                                    <td>Telefone: <?= @$obj->_telefone ?></td>
    
                                </tr>-->

<!--                                <tr>
                                    <td colspan="3">Indicaçao: <?= @$obj->_indicacao ?></td>
                                    <td>
                                        <a style="width: 60pt;" class="btn btn-outline btn-primary" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/chamarpaciente/<?= $ambulatorio_laudo_id ?>');" >
                                            Chamar
                                        </a>

                                    </td>
                                    <td>Indicacao: <?= @$obj->_indicado ?></td>
                                </tr>-->
                                <tr>
                                    <td colspan="3">Endereco: <?= @$obj->_logradouro ?>, <?= @$obj->_numero . ' ' . @$obj->_bairro ?> - <?= @$obj->_uf ?></td>
                                    <td>
                                        <a style="width: 60pt;" class="btn btn-outline btn-primary" onclick="javascript:window.open('<?= base_url() ?>cadastros/pacientes/carregarmedico/<?= @$obj->_paciente_id ?>');" >
                                            Cadastro
                                        </a>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="panel panel-default">
            <div class=" alert alert-info ">
                Atendimento
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" >

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile-pills" id="anamnese" data-toggle="tab">Anamnese</a>
                    </li>
                    <li ><a href="#home-pills" id="medidas" data-toggle="tab">Inf. Adicionais</a>
                    </li>

                    <!--<li><a href="#messages-pills" id="opcoes" data-toggle="tab">Opções</a>-->
                    </li>
                    <li><a href="#settings-pills" id="historico" data-toggle="tab">Histórico</a>
                    </li>

                </ul>


                <br>   <!--SOLUÇÃO PALEATIVA-->

                <!-- Tab panes -->
                <div class="tab-content">



                    <div class="tab-pane fade in active" id="profile-pills">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Modelo Atendimento</label>
                                    <select name="exame" id="exame" class="form-control" >
                                        <option value='' >Selecione</option>
                                        <?php foreach ($lista as $item) { ?>
                                            <option value="<?php echo $item->ambulatorio_modelo_laudo_id; ?>" ><?php echo $item->nome; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <?
                                    if (@$obj->_cabecalho == "") {
                                        $cabecalho = @$obj->_procedimento;
                                    } else {
                                        $cabecalho = @$obj->_cabecalho;
                                    }
                                    ?>
                                    <label>Procedimento Autorizado</label>
                                    <input type="text" id="cabecalho" class="form-control" name="cabecalho" value="<?= $cabecalho ?>"/>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Peso</label>
                                <div class="form-group input-group">
                                    <input type="text"   name="Peso" id="Peso" class="form-control"  alt="decimal" onkeyup="validar(this, 'num');" value="<?= @$obj->_peso ?>"/>
                                    <span class="input-group-addon">Kg</span>
                                </div>

                            </div>
                            <div class="col-lg-2">
                                <label>Altura</label>
                                <div class="form-group input-group">
                                    <input type="text" name="Altura" id="Altura" alt="integer" class="form-control" value="<?= @$obj->_altura; ?>" onblur="calculaImc()"/>
                                    <span class="input-group-addon">cm</span>
                                </div>

                            </div>
                            <div class="col-lg-2">
                                <label>IMC</label>
                                <div class="form-group input-group">

                                    <input type="text" name="imc" id="imc" class="form-control"  readonly/>
                                    <span class="input-group-addon">Kg/Cm&sup2;</span>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label>Anamnese</label>
                                    <textarea id="laudo" style="width: 600px;height: 500px;" name="laudo"><?= @$obj->_texto; ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="your-clock"></div>
                                    <!--<font color="#FF0000" size="6" face="Arial Black"><span id="clock1"></span><script>setTimeout('getSecs()', 1000);</script></font>-->

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregarreceituario/<?= $ambulatorio_laudo_id ?>//<?= $procedimento_tuss_id ?>');" >
                                    Receituario</a>
                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregarreceituarioespecial/<?= $ambulatorio_laudo_id ?>//<?= $procedimento_tuss_id ?>');" >
                                    R. especial</a>
                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregarexames/<?= $ambulatorio_laudo_id ?>/<?= $exame_id ?>');" >
                                    S. exames</a>
                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/carregaratestado/<?= $ambulatorio_laudo_id ?>//<?= $procedimento_tuss_id ?>');" >
                                    Atestado</a>
                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/anexarimagem/<?= $ambulatorio_laudo_id ?>');" >
                                    Arquivos</a>
                                <a class="btn btn-outline btn-info " onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/impressaolaudo/<?= $ambulatorio_laudo_id ?>/<?= $exame_id ?>');" >
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                    Imprimir</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>CID Primario</label>
                                    <input type="hidden" name="agrupadorfisioterapia" id="agrupadorfisioterapia" value="<?= @$obj->_agrupador_fisioterapia; ?>" class="size2" />
                                    <input type="hidden" name="txtCICPrimario" id="txtCICPrimario" value="<?= @$obj->_cid; ?>" class="size2" />
                                    <input type="text" name="txtCICPrimariolabel" id="txtCICPrimariolabel" value="<?= @$obj->_ciddescricao; ?>" class="form-control texto08 eac-square" />

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>CID Secundario</label>
                                    <input type="hidden" name="txtCICSecundario" id="txtCICSecundario" value="<?= @$obj->_cid2; ?>" class="form-control" />
                                    <input type="text" name="txtCICSecundariolabel" id="txtCICSecundariolabel" value="<?= @$obj->_cid2descricao; ?>" style="max-width: 400px;" class="form-control eac-square" />

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">

                            </div>

                        </div>

                        <style>
                            .your-clock{
                                /*position: fixed;*/
                                /*top: 0;*/
                                /*right:0;*/
                                z-index: 15;
                                zoom: 0.5;
                                -moz-transform: scale(0.5)
                            }
                        </style>               


                    </div>
                    <div class="tab-pane fade " id="home-pills">


                        <div class="row">

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Diabetes</label>
                                    <select name="diabetes" id="diabetes" class="form-control">
                                        <option value=''>Selecione</option>
                                        <option value='nao'<?
                                        if (@$obj->_diabetes == 'nao'):echo 'selected';
                                        endif;
                                        ?> >Não</option>
                                        <option value='sim' <?
                                        if (@$obj->_diabetes == 'sim'):echo 'selected';
                                        endif;
                                        ?> >Sim</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Hipertensão</label>
                                    <select name="hipertensao" id="hipertensao" class="form-control">
                                        <option value=''>Selecione</option>
                                        <option value='nao'<?
                                        if (@$obj->_diabetes == 'nao'):echo 'selected';
                                        endif;
                                        ?> >Não</option>
                                        <option value='sim' <?
                                        if (@$obj->_diabetes == 'sim'):echo 'selected';
                                        endif;
                                        ?> >Sim</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alergias</label>
                                    <input type="text" name="alergias" id="alergias" value="<?= @$obj->_alergias; ?>" class="form-control" />
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Cirurgias anteriores</label>
                                    <input type="text" name="cirurgias" id="cirurgias" value="<?= @$obj->_cirurgias; ?>" class="form-control" />
                                </div>
                            </div> 
                        </div>
                   

                </div>
                <div class="tab-pane fade" id="settings-pills">
                    <div >


                        <fieldset>
                            <legend><b><font size="3" color="red">Historico de consultas</font></b></legend>
                            <div>
                                <? foreach ($historico as $item) {
                                    ?>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td >Data: <?= substr($item->data_cadastro, 8, 2) . "/" . substr($item->data_cadastro, 5, 2) . "/" . substr($item->data_cadastro, 0, 4); ?></td>
                                            </tr>
                                            <tr>
                                                <td >Medico: <?= $item->medico; ?></td>
                                            </tr>
                                            <tr>
                                                <td >Tipo: <?= $item->procedimento; ?></td>
                                            </tr>
                                            <tr>
                                                <td >Queixa principal: <?= $item->texto; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Arquivos anexos:
                                                    <?
                                                    $this->load->helper('directory');
                                                    $arquivo_pasta = directory_map("./upload/consulta/$item->ambulatorio_laudo_id/");

                                                    $w = 0;
                                                    if ($arquivo_pasta != false):
                                                        foreach ($arquivo_pasta as $value) :
                                                            $w++;
                                                            ?>

                                                            <a onclick="javascript:window.open('<?= base_url() . "upload/consulta/" . $item->ambulatorio_laudo_id . "/" . $value ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=900,height=650');"><img  width="50px" height="50px" src="<?= base_url() . "upload/consulta/" . $item->ambulatorio_laudo_id . "/" . $value ?>"></a>
                                                            <?
                                                            if ($w == 8) {
                                                                
                                                            }
                                                        endforeach;
                                                        $arquivo_pasta = "";
                                                    endif
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                <? }
                                ?>
                            </div>
                            <div>
                                <? foreach ($historicoantigo as $itens) {
                                    ?>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td >Data: <?= substr($itens->data_cadastro, 8, 2) . "/" . substr($itens->data_cadastro, 5, 2) . "/" . substr($itens->data_cadastro, 0, 4); ?></td>
                                            </tr>
                                            <tr>
                                                <td >Queixa principal: <?= $itens->laudo; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                <? }
                                ?>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend><b><font size="3" color="red">Historico de exames</font></b></legend>
                            <div>
                                <table>
                                    <tbody>
                                        <? foreach ($historicoexame as $item) {
                                            ?>

                                            <tr>
                                                <td >Data: <?= substr($item->data_cadastro, 8, 2) . "/" . substr($item->data_cadastro, 5, 2) . "/" . substr($item->data_cadastro, 0, 4); ?></td>
                                            </tr>
                                            <tr>
                                                <td >Medico: <?= $item->medico; ?></td>
                                            </tr>
                                            <tr>
                                                <td >Tipo: <?= $item->procedimento; ?></td>
                                            </tr>
                                            <tr>
                                                <?
                                                $this->load->helper('directory');
                                                $arquivo_pastaimagem = directory_map("./upload/$item->exames_id/");
//        $data['arquivo_pasta'] = directory_map("/home/vivi/projetos/clinica/upload/$exame_id/");
                                                if ($arquivo_pastaimagem != false) {
                                                    sort($arquivo_pastaimagem);
                                                }
                                                $i = 0;
                                                if ($arquivo_pastaimagem != false) {
                                                    foreach ($arquivo_pastaimagem as $value) {
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                                <td >Imagens : <font size="2"><b> <?= $i ?></b>
                                                    <?
                                                    if ($arquivo_pastaimagem != false):
                                                        foreach ($arquivo_pastaimagem as $value) {
                                                            ?>
                                                            <a onclick="javascript:window.open('<?= base_url() . "upload/" . $item->exames_id . "/" . $value ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=900,height=650');"><img  width="100px" height="100px" src="<?= base_url() . "upload/" . $item->exames_id . "/" . $value ?>"></a>
                                                            <?
                                                        }
                                                        $arquivo_pastaimagem = "";
                                                    endif
                                                    ?>
                                                    <!--                <ul id="sortable">
            
                                                                    </ul>-->
                                                </td >
                                            </tr>
                                            <tr>
                                                <td >Laudo: <?= $item->texto; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Arquivos anexos:
                                                    <?
                                                    $this->load->helper('directory');
                                                    $arquivo_pasta = directory_map("./upload/consulta/$item->ambulatorio_laudo_id/");

                                                    $w = 0;
                                                    if ($arquivo_pasta != false):

                                                        foreach ($arquivo_pasta as $value) :
                                                            $w++;
                                                            ?>

                                                            <a onclick="javascript:window.open('<?= base_url() . "upload/consulta/" . $item->ambulatorio_laudo_id . "/" . $value ?> ', '_blank', 'toolbar=no,Location=no,menubar=no,width=900,height=650');"><img  width="50px" height="50px" src="<?= base_url() . "upload/consulta/" . $item->ambulatorio_laudo_id . "/" . $value ?>"></a>
                                                            <?
                                                            if ($w == 8) {
                                                                
                                                            }
                                                        endforeach;
                                                        $arquivo_pasta = "";
                                                    endif
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style='width:10pt;border:solid windowtext 1.0pt;
                                                    border-bottom:none;mso-border-top-alt:none;border-left:
                                                    none;border-right:none;' colspan="10">&nbsp;</th>
                                            </tr>

                                        <? }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend><b><font size="3" color="red">Digitaliza&ccedil;&otilde;es</font></b></legend>
                            <div>
                                <table>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <?
                                                $this->load->helper('directory');
                                                $arquivo_pasta = directory_map("./upload/paciente/$paciente_id/");

                                                $w = 0;
                                                if ($arquivo_pasta != false):

                                                    foreach ($arquivo_pasta as $value) :
                                                        $w++;
                                                        ?>

                                                    <td width="10px"><img  width="50px" height="50px" onclick="javascript:window.open('<?= base_url() . "upload/paciente/" . $paciente_id . "/" . $value ?>', '_blank', 'toolbar=no,Location=no,menubar=no,width=1200,height=600');" src="<?= base_url() . "upload/paciente/" . $paciente_id . "/" . $value ?>"><br><? echo substr($value, 0, 10) ?></td>
                                                    <?
                                                    if ($w == 8) {
                                                        
                                                    }
                                                endforeach;
                                                $arquivo_pasta = "";
                                            endif
                                            ?>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>

                        </fieldset>


                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <div class="panel panel-default">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    Salvar
                </div>
                <div class="panel-body">

                    <div class="row">
                        <!--                            <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label>Médico Responsável</label>
                                                            <select name="medico" id="medico" class="form-control">
                        <? foreach ($operadores as $value) : ?>
                                                                        <option value="<?= $value->operador_id; ?>"<?
                            if (@$obj->_medico_parecer1 == $value->operador_id):echo 'selected';
                            endif;
                            ?>><?= $value->nome; ?></option>
                        <? endforeach; ?>
                                                            </select>
                                                        </div>  
                                                    </div>-->
                        <!--                            <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label>Situa&ccedil;&atilde;o</label>
                                                            <select name="situacao" id="situacao" class="form-control">
                                                                <option value='DIGITANDO'<?
                        if (@$obj->_status == 'DIGITANDO'):echo 'selected';
                        endif;
                        ?> >DIGITANDO</option>
                                                                <option value='FINALIZADO' <?
                        if (@$obj->_status == 'FINALIZADO'):echo 'selected';
                        endif;
                        ?> >FINALIZADO</option>
                                                            </select>
                                                            <input type="hidden" name="status" id="status" value="<?= @$obj->_status; ?>" class="size2" />
                                                        </div>  
                                                    </div>-->
                        <!--                            <div class="col-lg-1">
                                                        <div class="form-group">
                                                            <label>Assinatura</label>
                        <?php
                        if (@$obj->_assinatura == "t") {
                            ?>
                                                                    <input class="checkbox" type="checkbox" name="assinatura" checked ="true" />
                            <?php
                        } else {
                            ?>
                                                                    <input class="checkbox" type="checkbox" name="assinatura"  />
                            <?php
                        }
                        ?>
                                                        </div>  
                                                    </div>-->
                        <!--                            <div class="col-lg-1">
                                                        <div class="form-group">
                                                            <label>Rodapé</label>
                        <?php
                        if (@$obj->_rodape == "t") {
                            ?>
                                                                    <input class="checkbox" type="checkbox" name="rodape" checked ="true" />
                            <?php
                        } else {
                            ?>
                                                                    <input class="checkbox" type="checkbox" name="rodape"  />
                            <?php
                        }
                        ?>
                                                        </div>  
                                                    </div>-->

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-1">
                            <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Salvar</button>
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.panel -->







</div> 
</form>
<!-- Final da DIV content -->
<script src="<?= base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>bootstrap/vendor/clock/compiled/flipclock.js"></script>
<script src="<?= base_url() ?>bootstrap/vendor/font-awesome/css/fonts.js"></script>

<script  src="<?= base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendor/autocomplete/jquery.easy-autocomplete.js" ></script>

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskMoney.js"></script>

<!--        SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

<script src="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.min.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script src="<?= base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>bootstrap/vendor/clock/compiled/flipclock.js"></script>
<script src="<?= base_url() ?>bootstrap/vendor/font-awesome/css/fonts.js"></script>

<script  src="<?= base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendor/autocomplete/jquery.easy-autocomplete.js" ></script>

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskMoney.js"></script>

<!--        SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

<script src="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.min.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript">
                                                            var clock = $('.your-clock').FlipClock({
                                                                language: 'Portuguese'
                                                            });
//                       var clock = new FlipClock($('.your-clock'), {
//                           // ... your options here
//                       });

//                       $("#anamnese").click(function () {
//                           $("#cid").show();
//                       });
                                                            jQuery("#Altura").mask("999", {placeholder: " "});
//               jQuery("#Peso").mask("999", {placeholder: " "});

                                                            function validar(dom, tipo) {
                                                                switch (tipo) {
                                                                    case'num':
                                                                        var regex = /[A-Za-z]/g;
                                                                        break;
                                                                    case'text':
                                                                        var regex = /\d/g;
                                                                        break;
                                                                }
                                                                dom.value = dom.value.replace(regex, '');
                                                            }


                                                            pesob1 = document.getElementById('Peso').value;
                                                            peso = parseFloat(pesob1.replace(',', '.'));
//    eso = pesob1.substring(0, 2)  + "." + pesob1.substring(3, 1);
                                                            alturae1 = document.getElementById('Altura').value;
                                                            var res = alturae1.substring(0, 1) + "." + alturae1.substring(1, 3);
                                                            var altura = parseFloat(res);
                                                            imc = peso / Math.pow(altura, 2);
                                                            //imc = res;
                                                            resultado = imc.toFixed(2)
                                                            document.getElementById('imc').value = resultado.replace('.', ',');

                                                            function calculaImc() {
                                                                pesob1 = document.getElementById('Peso').value;
                                                                peso = parseFloat(pesob1.replace(',', '.'));
                                                                //                                        peso = pesob1.substring(0, 2)  + "." + pesob1.substring(3, 1);
                                                                alturae1 = document.getElementById('Altura').value;
                                                                var res = alturae1.substring(0, 1) + "." + alturae1.substring(1, 3);
                                                                var altura = parseFloat(res);
                                                                imc = peso / Math.pow(altura, 2);
                                                                //imc = res;
                                                                resultado = imc.toFixed(2)
                                                                document.getElementById('imc').value = resultado.replace('.', ',');
                                                            }



                                                            var sHors = "0" + 0;
                                                            var sMins = "0" + 0;
                                                            var sSecs = -1;
                                                            function getSecs() {
                                                                sSecs++;
                                                                if (sSecs == 60) {
                                                                    sSecs = 0;
                                                                    sMins++;
                                                                    if (sMins <= 9)
                                                                        sMins = "0" + sMins;
                                                                }
                                                                if (sMins == 60) {
                                                                    sMins = "0" + 0;
                                                                    sHors++;
                                                                    if (sHors <= 9)
                                                                        sHors = "0" + sHors;
                                                                }
                                                                if (sSecs <= 9)
                                                                    sSecs = "0" + sSecs;
                                                                clock1.innerHTML = sHors + "<font color=#000000>:</font>" + sMins + "<font color=#000000>:</font>" + sSecs;
                                                                setTimeout('getSecs()', 1000);
                                                            }


                                                            $(document).ready(function () {
                                                                $('#sortable').sortable();
                                                            });


                                                            $(document).ready(function () {
                                                                jQuery('#ficha_laudo').validate({
                                                                    rules: {
                                                                        imagem: {
                                                                            required: true
                                                                        }
                                                                    },
                                                                    messages: {
                                                                        imagem: {
                                                                            required: "*"
                                                                        }
                                                                    }
                                                                });
                                                            });



                                                            function muda(obj) {
                                                                if (obj.value != 'DIGITANDO') {
                                                                    document.getElementById('titulosenha').style.display = "block";
                                                                    document.getElementById('senha').style.display = "block";
                                                                } else {
                                                                    document.getElementById('titulosenha').style.display = "none";
                                                                    document.getElementById('senha').style.display = "none";
                                                                }
                                                            }

                                                            // NOVOS AUTOCOMPLETES.
                                                            // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
                                                            // Url é a função que vai trazer o JSON.
                                                            // getValue é onde se define o nome do campo que você quer que apareça na lista
                                                            // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
                                                            // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
                                                            // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
                                                            // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
                                                            // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

                                                            var cid1 = {
                                                                url: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
                                                                getValue: "value",
                                                                list: {
                                                                    onSelectItemEvent: function () {
                                                                        var value = $("#txtCICPrimariolabel").getSelectedItemData().id;

                                                                        $("#txtCICPrimario").val(value).trigger("change");
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
                                                                    maxNumberOfElements: 20
                                                                },
                                                                theme: "bootstrap"
                                                            };

                                                            $("#txtCICPrimariolabel").easyAutocomplete(cid1);
                                                            // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
                                                            // NOVOS AUTOCOMPLETES.
                                                            // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
                                                            // Url é a função que vai trazer o JSON.
                                                            // getValue é onde se define o nome do campo que você quer que apareça na lista
                                                            // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
                                                            // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
                                                            // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
                                                            // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
                                                            // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

                                                            var cid2 = {
                                                                url: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
                                                                getValue: "value",
                                                                list: {
                                                                    onSelectItemEvent: function () {
                                                                        var value = $("#txtCICSecundariolabel").getSelectedItemData().id;

                                                                        $("#txtCICSecundario").val(value).trigger("change");
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
                                                                    maxNumberOfElements: 20
                                                                },
                                                                theme: "bootstrap"
                                                            };

                                                            $("#txtCICSecundariolabel").easyAutocomplete(cid2);
                                                            // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL

//               $(function () {
//                   $("#txtCICPrimariolabel").autocomplete({
//                       source: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
//                       minLength: 3,
//                       focus: function (event, ui) {
//                           $("#txtCICPrimariolabel").val(ui.item.label);
//                           return false;
//                       },
//                       select: function (event, ui) {
//                           $("#txtCICPrimariolabel").val(ui.item.value);
//                           $("#txtCICPrimario").val(ui.item.id);
//                           return false;
//                       }
//                   });
//               });

//               $(function () {
//                   $("#txtCICSecundariolabel").autocomplete({
//                       source: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
//                       minLength: 3,
//                       focus: function (event, ui) {
//                           $("#txtCICSecundariolabel").val(ui.item.label);
//                           return false;
//                       },
//                       select: function (event, ui) {
//                           $("#txtCICSecundariolabel").val(ui.item.value);
//                           $("#txtCICSecundario").val(ui.item.id);
//                           return false;
//                       }
//                   });
//               });

                                                            tinyMCE.init({
                                                                // General options
                                                                mode: "textareas",
                                                                theme: "advanced",
                                                                plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
                                                                // Theme options
                                                                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,pagebreak,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                                                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                                                theme_advanced_toolbar_location: "top",
                                                                theme_advanced_toolbar_align: "left",
                                                                theme_advanced_statusbar_location: "bottom",
                                                                theme_advanced_resizing: true,
                                                                // Example content CSS (should be your site CSS)
                                                                //                                    content_css : "css/content.css",
                                                                content_css: "js/tinymce/jscripts/tiny_mce/themes/advanced/skins/default/img/content.css",
                                                                // Drop lists for link/image/media/template dialogs
                                                                template_external_list_url: "lists/template_list.js",
                                                                external_link_list_url: "lists/link_list.js",
                                                                external_image_list_url: "lists/image_list.js",
                                                                media_external_list_url: "lists/media_list.js",
                                                                // Style formats
                                                                style_formats: [
                                                                    {title: 'Bold text', inline: 'b'},
                                                                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                                                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                                                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                                                                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                                                                    {title: 'Table styles'},
                                                                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                                                                ],
                                                                // Replace values for the template plugin
                                                                template_replace_values: {
                                                                    username: "Some User",
                                                                    staffid: "991234"
                                                                }

                                                            });

                                                            $(function () {
                                                                $('#exame').change(function () {
                                                                    if ($(this).val()) {
                                                                        //$('#laudo').hide();
                                                                        $('.carregando').show();
                                                                        $.getJSON('<?= base_url() ?>autocomplete/modeloslaudo', {exame: $(this).val(), ajax: true}, function (j) {
                                                                            options = "";

                                                                            options += j[0].texto;
                                                                            //                                                document.getElementById("laudo").value = options

                                                                            $('#laudo').val(options)
                                                                            var ed = tinyMCE.get('laudo');
                                                                            ed.setContent($('#laudo').val());

                                                                            //$('#laudo').val(options);
                                                                            //$('#laudo').html(options).show();
                                                                            //                                                $('.carregando').hide();
                                                                            //history.go(0) 
                                                                        });
                                                                    } else {
                                                                        $('#laudo').html('value=""');
                                                                    }
                                                                });
                                                            });

                                                            $(function () {
                                                                $('#linha').change(function () {
                                                                    if ($(this).val()) {
                                                                        //$('#laudo').hide();
                                                                        $('.carregando').show();
                                                                        $.getJSON('<?= base_url() ?>autocomplete/modeloslinhas', {linha: $(this).val(), ajax: true}, function (j) {
                                                                            options = "";

                                                                            options += j[0].texto;
                                                                            //                                                document.getElementById("laudo").value = $('#laudo').val() + options
                                                                            $('#laudo').val() + options
                                                                            var ed = tinyMCE.get('laudo');
                                                                            ed.setContent($('#laudo').val());
                                                                            //$('#laudo').html(options).show();
                                                                        });
                                                                    } else {
                                                                        $('#laudo').html('value=""');
                                                                    }
                                                                });
                                                            });

                                                            $(function () {
                                                                $("#linha2").autocomplete({
                                                                    source: "<?= base_url() ?>index.php?c=autocomplete&m=linhas",
                                                                    minLength: 1,
                                                                    focus: function (event, ui) {
                                                                        $("#linha2").val(ui.item.label);
                                                                        return false;
                                                                    },
                                                                    select: function (event, ui) {
                                                                        $("#linha2").val(ui.item.value);
                                                                        tinyMCE.triggerSave(true, true);
                                                                        document.getElementById("laudo").value = $('#laudo').val() + ui.item.id
                                                                        $('#laudo').val() + ui.item.id
                                                                        var ed = tinyMCE.get('laudo');
                                                                        ed.setContent($('#laudo').val());
                                                                        //$( "#laudo" ).val() + ui.item.id;
                                                                        document.getElementById("linha2").value = ''
                                                                        return false;
                                                                    }
                                                                });
                                                            });



                                                            $(function (a) {
                                                                $('#anteriores').change(function () {
                                                                    if ($(this).val()) {
                                                                        //$('#laudo').hide();
                                                                        $('.carregando').show();
                                                                        $.getJSON('<?= base_url() ?>autocomplete/laudosanteriores', {anteriores: $(this).val(), ajax: true}, function (i) {
                                                                            option = "";

                                                                            option = i[0].texto;
                                                                            tinyMCE.triggerSave();
                                                                            document.getElementById("laudo").value = option
                                                                            //$('#laudo').val(options);
                                                                            //$('#laudo').html(options).show();
                                                                            $('.carregando').hide();
                                                                            history.go(0)
                                                                        });
                                                                    } else {
                                                                        $('#laudo').html('value="texto"');
                                                                    }
                                                                });
                                                            });
                                                            //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                                                            $('.jqte-test').jqte();









</script>


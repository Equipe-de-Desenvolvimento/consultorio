<div id="page-wrapper">
<!--    <div class="row text-left">
        <div class="col-lg-1 text-left">
            <a class="btn btn-outline btn-danger" href="<?= base_url() ?>cadastros/pacientes">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>

            </a>
        </div>
    </div>-->
    
            <div class="panel panel-default">
                <a class="btn btn-outline btn-danger" href="<?= base_url() ?>cadastros/pacientes">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>

            </a>
                <div class=" alert alert-info ">
                    Solicita&ccedil;&otilde;es do Paciente
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" >
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#profile-pills" data-toggle="tab">Atendimento</a>
                        </li>


                        <li><a href="#guia" data-toggle="tab">Guia</a>
                        </li>
                        <li><a href="#avancado" data-toggle="tab">Avançado</a>
                        </li>
                    </ul>

                    <br>   <!--SOLUÇÃO PALEATIVA-->


                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div class="tab-pane fade in active" id="profile-pills">
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/guia/novoconsulta/<?= $paciente_id ?>">Novo Atendimento</a>
                            </div>
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info " href="<?= base_url() ?>cadastros/pacientes/procedimentoautorizarconsulta/<?= $paciente_id ?>">Autorizar Atendimento</a>
                            </div>
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>cadastros/pacientes/carregar/<?= $paciente_id ?>">Editar</a>
                            </div>
                        </div>
                   
                        <div class="tab-pane fade" id="guia">
                            <div>
                                <a  style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/guia/pesquisar/<?= $paciente_id ?>">Guias</a>
                            </div>
                            <div>
                                <a  style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/exametemp/carregarpacienteconsultatemp/<?= $paciente_id ?>">Atendimentos</a>
                            </div>
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/guia/orcamento/<?= $paciente_id ?>">Or&ccedil;amento</a>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="avancado">
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>cadastros/pacientes/anexarimagem/<?= $paciente_id ?>">Arquivos</a>
                            </div>
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/exametemp/unificar/<?= $paciente_id ?>">Unificar</a>
                            </div>
                            <div>
                                <a style="width: 130pt;" class="btn btn-outline btn-info" href="<?= base_url() ?>ambulatorio/exametemp/excluirpaciente/<?= $paciente_id ?>">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
       
    <?
    $args['paciente'] = $paciente_id;
    $perfil_id = $this->session->userdata('perfil_id');
    $internacao = $this->session->userdata('internacao');
    ?>

<!--    <fieldset>
        <legend></legend>
        <div>
            <table>
                <tr>
                    <td width="80px;"><div class="bt_link_new"></div></td>
                    <td width="80px;"><div class="bt_link_new"></div></td>
                    <td width="80px;"><div class="bt_link_new"><a href="<?= base_url() ?>ambulatorio/guia/novoatendimento/<?= $paciente_id ?>">Novo Atendimento</a></div></td>
                    <td width="100px;"><div class="bt_linkm"></div></td>



                    <td width="100px;"><div class="bt_linkm"></div></td>
                    <td width="100px;"><div class="bt_linkm"><a href="<?= base_url() ?>cadastros/pacientes/cancelamento/<?= $paciente_id ?>" target="_blank">Cancelamentos</a></div></td>
                </tr>
                <tr><td width="100px;"><div class="bt_link_new"></div></td>
                    <td width="100px;"><div class="bt_link_new"></div></td>
                    <td width="100px;"><div class="bt_link_new"></div></td>
                    <td width="100px;"><div class="bt_link_new"><a href="<?= base_url() ?>cadastros/pacientes/procedimentoautorizaratendimento/<?= $paciente_id ?>">Autorizar Atendimento</a></div></td>
                    <td width="100px;"><div class="bt_linkm"></div></td>
                    <? if ($perfil_id == 1) { ?>
                        <td width="100px;"><div class="bt_linkm"></div></td>
                    <? } ?>




                </tr>
                <tr>
                    <td width="100px;"><div class="bt_link_new"></div></td>

                    <td width="100px;"><div class="bt_link_new"><a href="<?= base_url() ?>ambulatorio/laudo/carregarlaudohistorico/<?= $paciente_id ?>">Hist. Consulta</a></div></td>
                    <td width="250px;"><div class="bt_link_new"><a href="<?= base_url() ?>emergencia/triagem/gravarsolicitacaotriagem/<?= $paciente_id ?>">triagem</a></div></td>
                    <td width="250px;"><div class="bt_link_new"></div></td>
                    <td width="250px;"><div class="bt_link_new"></div></td>
                    <td width="100px;"><div class="bt_linkm"><a href="<?= base_url() ?>ambulatorio/exametemp/carregarpacientetemp/<?= $paciente_id ?>">Exames</a></div></td>
                    <? if ($perfil_id == 1) { ?>
                        <td width="100px;"><div class="bt_linkm"></div></td>
                    <? } ?>

                </tr>
                <? if ($internacao == 't') { ?>
                    <tr>
                        <td width="100px;"><div class="bt_link_new"><a href="<?= base_url() ?>internacao/internacao/novointernacao/<?= $paciente_id ?>">Internação</a></div></td>


                    </tr>
                <? }
                ?>
            </table>            
        </div>

    </fieldset>-->
<div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Paciente
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-4">
                        <div >
                            <label>Nome</label>
                            <input readonly type="text" id="txtNome" name="nome" class="form-control texto08" value="<?= $paciente['0']->nome; ?>" required="true"  placeholder="Nome do Paciente">
                            <input readonly type ="hidden" name ="paciente_id"  value ="<?= $paciente['0']->paciente_id; ?>" id ="txtPacienteId">

                        </div>
                        <div>
                            <label>CPF</label>


                            <input readonly type="text" name="cpf" id ="txtCpf" maxlength="11" alt="cpf" class="form-control texto04" value="<?= $paciente['0']->cpf; ?>" />
                        </div>





                    </div>

                    <div class="col-lg-2">
                        <div >
                            <label>Sexo</label>
                            
                            <input readonly type="text"  name="sexo" id="txtSexo"  class="form-control texto04"  value="<?if ($paciente['0']->sexo == "M"){
                                    echo 'Masculino';
                                }elseif($paciente['0']->sexo == "F"){
                                    echo 'Feminino';
                                }else{
                                    echo 'Não Informado';
                                } ?>"/>
                                
                                   
                                   
                                  
                                 
                        </div>

                        <div>
                            <label>RG</label>


                            <input readonly type="text" name="rg"  id="txtDocumento" class="form-control texto04" maxlength="20" value="<?= $paciente['0']->rg; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div >
                            <label>Data de Nascimento</label>
                            <input readonly type="text" name="nascimento" id="txtNascimento" required="true" alt="date" class="form-control texto04 date" 
                                   placeholder="Data de Nascimento"

                                   value="<?php
                                   if ($paciente['0']->nascimento != '') {
                                       echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4);
                                   }
                                   ?>"        

                                   >
                        </div>

                        <div>
                            <label>Email</label>
                            <input readonly  placeholder="Email" type="text" id="txtCns" name="cns"  class="form-control texto06" value="<?= $paciente['0']->cns; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">
                        <div>
                             <?
                                if(file_exists("./upload/webcam/pacientes/" . $paciente['0']->paciente_id . ".jpg")){?>
                                 <img class="img-thumbnail img-rounded" src="<?= base_url() ?>upload/webcam/pacientes/<?=  $paciente['0']->paciente_id ?>.jpg" alt="" style="width: 100pt; height: 110pt;" />   
                               <? }else{?>
                                   <img class="img-thumbnail img-rounded" src="" alt="Sem foto" style="width: 100pt; height: 110pt;" />
                                <?}
                                ?>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Domicilio
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div >
                            <label>T.Logradouro</label>
                            <input readonly type="text" id="txtCelular" class="form-control texto04" name="tipo" value="<?=$paciente['0']->descricao; ?>" />

                        </div>
                    

                        <div>
                            <label>Telefone</label>
                            <?
                            if ($paciente['0']->telefone != '' && strlen($paciente['0']->telefone) > 3) {

                                if (preg_match('/\(/', $paciente['0']->telefone)) {
                                    $telefone = $paciente['0']->telefone;
                                } else {
                                    $telefone = "(" . substr($paciente['0']->telefone, 0, 2) . ")" . substr($paciente['0']->telefone, 2, strlen($paciente['0']->telefone) - 2);
                                }
                            } else {
                                $telefone = '';
                            }
                            if ($paciente['0']->celular != '' && strlen($paciente['0']->celular) > 3) {
                                if (preg_match('/\(/', $paciente['0']->celular)) {
                                    $celular = $paciente['0']->celular;
                                } else {
                                    $celular = "(" . substr($paciente['0']->celular, 0, 2) . ")" . substr($paciente['0']->celular, 2, strlen($paciente['0']->celular) - 2);
                                }
                            } else {
                                $celular = '';
                            }
                            ?>

                            <input readonly type="text" id="txtTelefone" class="form-control texto04" name="telefone"  value="<?= @$telefone; ?>" />
                        </div>
                        <div>
                            <label>Celular*</label>
                            <input readonly type="text" id="txtCelular" class="form-control texto04" name="celular" value="<?= @$celular; ?>" required=""/>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div>
                            <label>Endere&ccedil;o</label>
                            <input readonly type="text" id="txtendereco" class="form-control texto10" name="endereco" value="<?= $paciente['0']->logradouro; ?>" />
                        </div>

                        <div>
                            <label>Bairro</label>


                            <input readonly type="text" id="txtBairro" class="form-control texto10" name="bairro" value="<?= $paciente['0']->bairro; ?>" />
                        </div>
                        


                    </div>
                    <div class="col-lg-3">

                        <div>
                            <label>N&uacute;mero</label>


                            <input readonly type="text" id="txtNumero" class="form-control texto04" name="numero" value="<?= $paciente['0']->numero; ?>" />
                        </div>

                        <div>
                            <label>Município</label>


                            <input readonly type="hidden" id="txtCidadeID" class="texto_id" name="municipio_id" value="<?= $paciente['0']->cidade_cod; ?>" readonly="true" />
                            <input readonly type="text" id="txtCidade" class="form-control texto04" name="txtCidade" value="<?= $paciente['0']->cidade_desc; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div>
                            <label>Complemento</label>


                            <input readonly type="text" id="txtComplemento" class="form-control texto08" name="complemento" value="<?= $paciente['0']->complemento; ?>" />
                        </div>

                        <div>
                            <label>CEP</label>

                            <input readonly type="text" id="cep" class="form-control texto02" name="cep"  value="<?= $paciente['0']->cep; ?>" />

                        </div>

                    </div>

                </div>



            </div>
        </div>
 
    </div>

<!--<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<!--<script type="text/javascript">
                    sweetAlert("Oops...", "Something went wrong!", "success");
</script>-->

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-verificaCPF.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/funcoes.js"></script>-->

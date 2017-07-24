<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <form name="form_paciente" id="form_paciente" action="<?= base_url() ?>cadastros/pacientes/gravarpacientemedico" method="post">
        <!--        Chamando o Script para a Webcam   -->
        <script src="<?= base_url() ?>js/webcam.js"></script>
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="panel panel-default">-->
                <div class="alert alert-success">
                    Cadastro de Paciente
                </div>

                <!--</div>-->
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Paciente
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nome*</label>
                            <input type="text" id="txtNome" name="nome" class="form-control texto08" value="<?= @$obj->_nome; ?>" required="true"  placeholder="Nome do Paciente">
                            <input type ="hidden" name ="paciente_id"  value ="<?= @$obj->_paciente_id; ?>" id ="txtPacienteId">

                        </div>
                        <div class="form-group">
                            <label>CPF</label>


                            <input type="text" name="cpf" id ="txtCpf" maxlength="11" alt="cpf" class="form-control texto04" value="<?= @$obj->_cpf; ?>" />
                        </div>

                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Sexo*</label>
                            <select name="sexo" id="txtSexo" class="form-control texto04" required="">
                                <option value="" <?
                                if (@$obj->_sexo == ""):echo 'selected';
                                endif;
                                ?>>Selecione</option>
                                <option value="M" <?
                                if (@$obj->_sexo == "M"):echo 'selected';
                                endif;
                                ?>>Masculino</option>
                                <option value="F" <?
                                if (@$obj->_sexo == "F"):echo 'selected';
                                endif;
                                ?>>Feminino</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>RG</label>


                            <input type="text" name="rg"  id="txtDocumento" class="form-control texto04" maxlength="20" value="<?= @$obj->_documento; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>Data de Nascimento*</label>
                            <input type="text" name="nascimento" id="txtNascimento" required="true" alt="date" class="form-control texto04 date" 
                                   placeholder="Data de Nascimento"

                                   value="<?php
                                   if (@$obj->_nascimento != '') {
                                       echo substr(@$obj->_nascimento, 8, 2) . '/' . substr(@$obj->_nascimento, 5, 2) . '/' . substr(@$obj->_nascimento, 0, 4);
                                   }
                                   ?>"        

                                   >
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input  placeholder="Email" type="text" id="txtCns" name="cns"  class="form-control texto04" value="<?= @$obj->_cns; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div >
                            <label>Fotografia</label>


                        </div>
                        <div>
                            <!--<label>Fotografia</label>-->
                            <a class="btn btn-primary" data-toggle="modal" onClick="ativar_camera()" data-target="#myModal">
                                <i class="fa fa-camera fa-1x" aria-hidden="true"></i>

                            </a>
                            <span id="imagem_paciente">

                                <? if (file_exists("./upload/webcam/pacientes/" . @$obj->_paciente_id . ".jpg")) { ?>
                                    <img class="img-thumbnail img-rounded img-responsive" src="<?= base_url() ?>upload/webcam/pacientes/<?= @$obj->_paciente_id ?>.jpg" alt="" style="width: 100pt; height: 100pt;" />   
                                <? } else { ?>
                                    <img class="img-thumbnail img-rounded img-responsive" src="" alt="" style="width: 100pt; height: 100pt;" />
                                <? }
                                ?>


                                <!-- Modal -->
                            </span>

                        </div>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Fotografia</h4>
                                    </div>
                                    <div class="modal-body">
                                        <fieldset>
                                            <!--<legend>Fotografia</legend>-->
                                            <table>
                                                <tr>
                                                    <th>
                                                        Câmera
                                                    </th>
                                                    <th>
                                                        &nbsp; 
                                                        &nbsp; 
                                                        &nbsp; 
                                                        &nbsp; 
                                                        &nbsp; 
                                                    </th>
                                                    <th>
                                                        Resultado 
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td >

                                                        <div  id="my_camera">


                                                        </div>
                                                    </td>

                                                    <td>
                                                    </td>
                                                    <td>
                                                        <div id="results">

                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a class="btn btn-danger" onClick="take_snapshot()"><i class="fa fa-camera fa-1x" aria-hidden="true"></i></a> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                        <a  onClick="imagem_paciente()" class="btn btn-primary" data-dismiss="modal">Fechar</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <input id="mydata" type="hidden" name="mydata" value=""/>

        <div class="panel panel-default ">
            <div class="alert alert-info">
                Domicilio
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>CEP</label>

                            <input type="text" id="cep" class="form-control texto03 eac-square" name="cep"  value="<?= @$obj->_cep; ?>" />
                            <input type="hidden" id="ibge" class="form-control texto02" name="ibge" />

                        </div>
                        <div class="form-group">
                            <label>Indicação</label>

                            <select name="indicacao" id="indicacao" class="form-control texto04" >
                                <option value=''>Selecione</option>
                                <?php
                                $indicacao = $this->paciente->listaindicacao($_GET);
                                foreach ($indicacao as $item) {
                                    ?>
                                    <option value="<?php echo $item->paciente_indicacao_id; ?>" 
                                    <?
                                    if (@$obj->_indicacao == $item->paciente_indicacao_id):echo 'selected';
                                    endif;
                                    ?>>
                                            <?php echo $item->nome; ?>
                                    </option>
                                    <?php
                                }
                                ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Telefone</label>
                            <?
                            if (@$obj->_telefone != '' && strlen(@$obj->_telefone) > 3) {

                                if (preg_match('/\(/', @$obj->_telefone)) {
                                    $telefone = @$obj->_telefone;
                                } else {
                                    $telefone = "(" . substr(@$obj->_telefone, 0, 2) . ")" . substr(@$obj->_telefone, 2, strlen(@$obj->_telefone) - 2);
                                }
                            } else {
                                $telefone = '';
                            }
                            if (@$obj->_celular != '' && strlen(@$obj->_celular) > 3) {
                                if (preg_match('/\(/', @$obj->_celular)) {
                                    $celular = @$obj->_celular;
                                } else {
                                    $celular = "(" . substr(@$obj->_celular, 0, 2) . ")" . substr(@$obj->_celular, 2, strlen(@$obj->_celular) - 2);
                                }
                            } else {
                                $celular = '';
                            }
                            ?>

                            <input type="text" id="txtTelefone" class="form-control texto04" name="telefone"  value="<?= @$telefone; ?>" />
                        </div>


                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Endere&ccedil;o</label>
                            <input type="text" id="rua" class="form-control texto10" name="endereco" value="<?= @$obj->_endereco; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>


                            <input type="text" id="bairro" class="form-control texto10" name="bairro" value="<?= @$obj->_bairro; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Celular*</label>
                            <input type="text" id="txtCelular" class="form-control texto04" name="celular" value="<?= @$celular; ?>" required=""/>
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>N&uacute;mero</label>


                            <input type="text" id="txtNumero" class="form-control texto04" name="numero" value="<?= @$obj->_numero; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Município</label>


                            <input type="hidden" id="txtCidadeID" class="texto_id" name="municipio_id" value="<?= @$obj->_cidade; ?>" readonly="true" />
                            <input type="text" id="txtCidade" class="form-control texto04 eac-square" name="txtCidade" value="<?= @$obj->_cidade_nome; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>Complemento</label>


                            <input type="text" id="txtComplemento" class="form-control texto08" name="complemento" value="<?= @$obj->_complemento; ?>" />
                        </div>

                        

                    </div>

                </div>



            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados Sociais
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Plano de Saude</label>


                            <select name="convenio" id="txtconvenio" class="form-control texto04" >
                                <option value='' >Selecione</option>
                                <?php
                                $listaconvenio = $this->paciente->listaconvenio($_GET);
                                foreach ($listaconvenio as $item) {
                                    ?>

                                    <option   value =<?php echo $item->convenio_id; ?> <?
                                if (@$obj->_convenio == $item->convenio_id):echo 'selected';
                                endif;
                                    ?>><?php echo $item->descricao; ?></option>
                                              <?php
                                          }
                                          ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estado civil</label>


                            <select name="estado_civil_id" id="txtEstadoCivil" class="form-control texto04" selected="<?= @$obj->_estado_civil; ?>">
                                <option value=0 <?
                                          if (@$obj->_estado_civil == 0):echo 'selected';
                                          endif;
                                          ?>>Selecione</option>
                                <option value=1 <?
                                if (@$obj->_estado_civil == 1):echo 'selected';
                                endif;
                                          ?>>Solteiro</option>
                                <option value=2 <?
                                if (@$obj->_estado_civil == 2):echo 'selected';
                                endif;
                                          ?>>Casado</option>
                                <option value=3 <?
                                if (@$obj->_estado_civil == 3):echo 'selected';
                                endif;
                                          ?>>Divorciado</option>
                                <option value=4 <?
                                if (@$obj->_estado_civil == 4):echo 'selected';
                                endif;
                                          ?>>Viuvo</option>
                                <option value=5 <?
                                if (@$obj->_estado_civil == 5):echo 'selected';
                                endif;
                                          ?>>Outros</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>N&uacute;mero da Carteirinha</label>


                            <input type="text" id="txtconvenionumero" class="form-control texto08" name="convenionumero" value="<?= @$obj->_convenionumero; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Escolaridade</label>

                            <select name="escolaridade" id="escolaridade" class="form-control texto04" selected="<?= @$obj->_escolaridade_id; ?>">
                                <option value=0 <?
                                if (@$obj->_escolaridade_id == 0):echo 'selected';
                                endif;
                                          ?>>Selecione</option>
                                <option value=1 <?
                                if (@$obj->_escolaridade_id == 1):echo 'selected';
                                endif;
                                          ?>>Fundamental-Incompleto </option>
                                <option value=2 <?
                                if (@$obj->_escolaridade_id == 2):echo 'selected';
                                endif;
                                          ?>>Fundamental-Completo</option>

                                <option value=3 <?
                                if (@$obj->_escolaridade_id == 3):echo 'selected';
                                endif;
                                          ?>>Médio 
                                    -
                                    Incompleto</option>
                                <option value=4 <?
                                if (@$obj->_escolaridade_id == 4):echo 'selected';
                                endif;
                                          ?>>Médio 
                                    -
                                    Completo
                                </option>
                                <option value=5 <?
                                if (@$obj->_escolaridade_id == 5):echo 'selected';
                                endif;
                                          ?>>Superior 
                                    -
                                    Incompleto</option>
                                <option value=6 <?
                                if (@$obj->_escolaridade_id == 6):echo 'selected';
                                endif;
                                          ?>>Superior-Completo </option>


                            </select>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Ocupa&ccedil;&atilde;o</label>
                            <input type="hidden" id="txtcboID" class="texto_id" name="txtcboID" value="<?= @$obj->_cbo_ocupacao_id; ?>" readonly="true" />
                            <input type="text" id="txtcbo" class="form-control texto08 eac-square" name="txtcbo" value="<?= @$obj->_cbo_nome; ?>" />
                        </div>  

                        <div class="form-group">
                            <label>Ra&ccedil;a / Cor</label>


                            <select name="raca_cor" id="txtRacaCor" class="form-control texto04">

                                <option value=0  <?
                                if (@$obj->_raca_cor == 0):echo 'selected';
                                endif;
                                          ?>>Selecione</option>
                                <option value=1 <?
                                if (@$obj->_raca_cor == 1):echo 'selected';
                                endif;
                                          ?>>Branca</option>
                                <option value=2 <?
                                if (@$obj->_raca_cor == 2):echo 'selected';
                                endif;
                                          ?>>Amarela</option>
                                <option value=3 <?
                                if (@$obj->_raca_cor == 3):echo 'selected';
                                endif;
                                          ?>>Preta</option>
                                <option value=4 <?
                                if (@$obj->_raca_cor == 4):echo 'selected';
                                endif;
                                          ?>>Parda</option>
                                <option value=5 <?
                                if (@$obj->_raca_cor == 5):echo 'selected';
                                endif;
                                          ?>>Ind&iacute;gena</option>
                            </select>
                        </div>
                    </div>



                </div>



            </div>

        </div>


        <div class="panel panel-default ">

            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-3">
                        <p>
                            <button  class="btn btn-outline btn-success btn-sm" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>

                            <a  href="<?= base_url() ?>cadastros/pacientes">
                                <button class="btn btn-outline btn-warning btn-sm" type="button" class="btn">Voltar</button>
                            </a>
                        </p>

                    </div>

                    <div class="col-lg-1">



                    </div>

                </div>



            </div>

        </div>

    </form>


    <script language="JavaScript">
        Webcam.set({
            width: 140,
            height: 160,
            dest_width: 480,
            dest_height: 360,
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        function ativar_camera() {
            Webcam.attach('#my_camera');
        }
        function take_snapshot() {
            // tira a foto e gera uma imagem para a div
            Webcam.snap(function (data_uri) {
                // display results in page
                var imagem = data_uri;
                document.getElementById('results').innerHTML =
                        '<img class=" img-rounded" height = "160" width = "140" src="' + data_uri + '"/>';
                //              Gera uma variável com o código binário em base 64 e joga numa variável
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                //              Pega o valor do campo mydata, campo hidden que armazena temporariamente o código da imagem
                document.getElementById('mydata').value = raw_image_data;

                document.getElementById('imagem_paciente').innerHTML =
                        '<img class="img-thumbnail img-rounded img-responsive" src="' + data_uri + '" alt="" style="width: 100pt; height: 100pt;" /> ';

            });
        }




    </script>

</div>

<!--<link rel="stylesheet" href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css">-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->

<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script>
        function mascaraTelefone(campo) {

            function trata(valor, isOnBlur) {

                valor = valor.replace(/\D/g, "");
                valor = valor.replace(/^(\d{2})(\d)/g, "($1)$2");

                if (isOnBlur) {

                    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2");
                } else {

                    valor = valor.replace(/(\d)(\d{3})$/, "$1-$2");
                }
                return valor;
            }

            campo.onkeypress = function (evt) {

                var code = (window.event) ? window.event.keyCode : evt.which;
                var valor = this.value

                if (code > 57 || (code < 48 && code != 8 && code != 0)) {
                    return false;
                } else {
                    this.value = trata(valor, false);
                }
            }

            campo.onblur = function () {

                var valor = this.value;
                if (valor.length < 13) {
                    this.value = ""
                } else {
                    this.value = trata(this.value, true);
                }
            }

            campo.maxLength = 14;
        }


</script>
<script type="text/javascript">
    mascaraTelefone(form_paciente.txtTelefone);
    mascaraTelefone(form_paciente.txtCelular);
//(99) 9999-9999


    // NOVOS AUTOCOMPLETES.
    // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
    // Url é a função que vai trazer o JSON.
    // getValue é onde se define o nome do campo que você quer que apareça na lista
    // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
    // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
    // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
    // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
    // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

    var profissionais = {
        url: "<?= base_url() ?>index.php?c=autocomplete&m=cboprofissionais",
        getValue: "value",
        list: {
            onSelectItemEvent: function () {
                var value = $("#txtcbo").getSelectedItemData().id;

                $("#txtcboID").val(value).trigger("change");
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
            maxNumberOfElements: 10,

        },
        theme: "bootstrap"
    };

    $("#txtcbo").easyAutocomplete(profissionais);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
    // 
    // 
    //


    // NOVOS AUTOCOMPLETES.
    // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
    // Url é a função que vai trazer o JSON.
    // getValue é onde se define o nome do campo que você quer que apareça na lista
    // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
    // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
    // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
    // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
    // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

    var cidade = {
        url: "<?= base_url() ?>index.php?c=autocomplete&m=cidade",
        getValue: "value",
        list: {
            onSelectItemEvent: function () {
                var value = $("#txtCidade").getSelectedItemData().id;

                $("#txtCidadeID").val(value).trigger("change");
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

    $("#txtCidade").easyAutocomplete(cidade);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL




//    $(function () {
//        $("#txtCidade").autocomplete({
//            source: "<?= base_url() ?>index.php?c=autocomplete&m=cidade",
//            minLength: 3,
//            focus: function (event, ui) {
//                $("#txtCidade").val(ui.item.label);
//                return false;
//            },
//            select: function (event, ui) {
//                $("#txtCidade").val(ui.item.value);
//                $("#txtCidadeID").val(ui.item.id);
//                return false;
//            }
//        });
//    });

    $(function () {
        $('#txtconvenio').change(function () {
            if ($(this).val()) {
                $('.carregando').show();
                $.getJSON('<?= base_url() ?>autocomplete/conveniocarteira', {convenio1: $(this).val()}, function (j) {
                    options = '<option value=""></option>';
                    if (j[0].carteira_obrigatoria == 't') {
                        $("#txtconvenionumero").prop('required', true);
                    } else {
                        $("#txtconvenionumero").prop('required', false);
                    }

                });
            }
        });
    });

    $('#cep').mask('99999-999');

    $(document).ready(function () {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
//            $("#rua").val("");
//            $("#bairro").val("");
//            $("#txtCidade").val("");
//            $("#uf").val("");
//            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function () {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
//                    $("#rua").val("Aguarde...");
//                    $("#bairro").val("Aguarde...");
//                    $("#txtCidade").val("Aguarde...");
//                    $("#uf").val("Aguarde...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#txtCidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                            $.getJSON('<?= base_url() ?>autocomplete/cidadeibge', {ibge: dados.ibge}, function (j) {
                                $("#txtCidade").val(j[0].value);
                                $("#txtCidadeID").val(j[0].id);

                            });

                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
//                            alert("CEP não encontrado.");

                            swal({
                                title: "Correios informa!",
                                text: "CEP não encontrado.",
                                imageUrl: "<?= base_url() ?>img/correios.png"
                            });
                        }
                    });

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
//                    alert("Formato de CEP inválido.");
                    swal({
                        title: "Correios informa!",
                        text: "Formato de CEP inválido.",
                        imageUrl: "<?= base_url() ?>img/correios.png"
                    });
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });




</script>

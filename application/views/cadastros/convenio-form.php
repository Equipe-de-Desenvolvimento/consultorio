
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Convênio
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_convenio" id="form_convenio" action="<?= base_url() ?>cadastros/convenio/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nome*</label>
                            <input type="hidden" name="txtconvenio_id" class="form-control" value="<?= @$obj->_convenio_id; ?>" />
                            <input type="text" name="txtNome" class="form-control" value="<?= @$obj->_nome; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label >Raz&atilde;o social</label>
                            <input type="text" name="txtrazaosocial" class="form-control" value="<?= @$obj->_razao_social; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" name="txtCNPJ" maxlength="14" class="form-control cnpj" value="<?= @$obj->_cnpj; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Registro ANS</label>
                            <input type="text" name="txtregistroans" class="form-control" value="<?= @$obj->_registroans; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Codigo identifica&ccedil;&atilde;o</label>
                            <input type="text" name="txtcodigo" maxlength="20" class="form-control" value="<?= @$obj->_codigoidentificador; ?>" />
                        </div>


                    </div>
                </div>

            </div>

        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Endereço
            </div>
            <div class="panel-body">
                <div class="row">
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
                            <input type="text" id="txtCelular" class="form-control" name="celular" alt="phone" value="<?= @$obj->_celular; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>N&uacute;mero</label>
                            <input type="text" id="txtNumero" class="form-control" name="numero" value="<?= @$obj->_numero; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Município</label>
                            <input type="hidden" id="txtCidadeID" class="texto_id" name="municipio_id" value="<?= @$obj->_cidade; ?>" readonly="true" />
                            <input type="text" id="txtCidade" class="form-control texto04 eac-square" name="txtCidade" value="<?= @$obj->_cidade_nome; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>


                            <input type="text" id="txtTelefone" class="form-control" name="telefone" value="<?= @$obj->_telefone; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label>Complemento</label>


                            <input type="text" id="txtComplemento" class="form-control texto08" name="complemento" value="<?= @$obj->_complemento; ?>" />
                        </div>

                        <div class="form-group">
                            <label>CEP</label>

                            <input type="text" id="cep" class="form-control texto03 eac-square" name="cep"  value="<?= @$obj->_cep; ?>" />
                            <input type="hidden" id="ibge" class="form-control texto02" name="ibge" />

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="panel panel-default ">
            <div class="alert alert-info">
                Detalhes
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Tabela</label>
                            <select  name="tipo" id="tipo" class="form-control" >
                                <option value="SIGTAP" <?
                                if (@$obj->_tabela == "SIGTAP"):echo 'selected';
                                endif;
                                ?>>SIGTAP</option>
                                <option value="AMB92" <?
                                if (@$obj->_tabela == "AMB92"):echo 'selected';
                                endif;
                                ?>>AMB92</option>
                                <option value="TUSS" <?
                                if (@$obj->_tabela == "TUSS"):echo 'selected';
                                endif;
                                ?>>TUSS</option>
                                <option value="CBHPM" <?
                                if (@$obj->_tabela == "CBHPM"):echo 'selected';
                                endif;
                                ?>>CBHPM</option>
                                <option value="PROPRIA" <?
                                if (@$obj->_tabela == "PROPRIA"):echo 'selected';
                                endif;
                                ?>>TABELA PROPRIA</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Grupo convenio</label>
                            <select name="grupoconvenio" id="grupoconvenio" class="form-control" >
                                <option value='' >Selecione</option>
                                <?php
                                $grupoconvenio = $this->grupoconvenio->listargrupoconvenios();
                                foreach ($grupoconvenio as $item) {
                                    ?>

                                    <option   value =<?php echo $item->convenio_grupo_id; ?> <?
                                    if (@$obj->_convenio_grupo_id == $item->convenio_grupo_id):echo 'selected';
                                    endif;
                                    ?>><?php echo $item->nome; ?></option>
                                              <?php
                                          }
                                          ?> 
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>P.Procedimento(%)</label>
                            <input type="text" id="procedimento1" class="form-control" name="procedimento1" alt="integer" value="<?= @$obj->_procedimento1; ?>" />
                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>O.Procedimentos(%)</label>
                            <input type="text" id="procedimento2" class="form-control integer" name="procedimento2" alt="integer" value="<?= @$obj->_procedimento2; ?>" />
                        </div>

                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>IR(%)</label>
                            <input type="text" id="ir" class="form-control integer" name="ir" alt="decimal" value="<?= @$obj->_ir; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>PIS(%)</label>
                            <input type="text" id="pis" class="form-control integer" name="pis" alt="decimal" value="<?= @$obj->_pis; ?>" />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>COFINS(%)</label>
                            <input type="text" id="cofins" class="form-control integer" name="cofins" alt="decimal" value="<?= @$obj->_cofins; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>CSLL(%)</label>
                            <input type="text" id="csll" class="form-control integer" name="csll" alt="decimal" value="<?= @$obj->_csll; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>ISS(%)</label>
                            <input type="text" id="iss" class="form-control integer" name="iss" alt="decimal" value="<?= @$obj->_iss; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Base P/Imposto(%)</label>
                            <input type="text" id="valor_base" class="form-control integer" name="valor_base" alt="decimal" value="<?= @$obj->_valor_base; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Data entrega</label>
                            <input type="text" id="entrega" class="form-control" name="entrega" alt="integer" value="<?= @$obj->_entrega; ?>" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div>
                            <label>Tempo p/ Pag</label>
                            <input type="text" id="pagamento" class="form-control" name="pagamento" alt="integer" value="<?= @$obj->_pagamento; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Condição de Recebimento
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Recebimento em Caixa</label>

                            <select name="txtdinheiro" id="txtdinheiro" class="form-control" >
                                <option value='1' <? if (@$obj->_dinheiro == "t") {
                                              echo 'selected';
                                          } ?>>Sim</option>
                                <option value='0' <? if (@$obj->_dinheiro == "f") {
                                              echo 'selected';
                                          } ?>>Não</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Credor / Devedor</label>
                            <select name="credor_devedor" id="credor_devedor" class="form-control " >
                                <option value='' >Selecione</option>
<?php
$credor_devedor = $this->convenio->listarcredordevedor();
foreach ($credor_devedor as $item) {
    ?>

                                    <option   value =<?php echo $item->financeiro_credor_devedor_id; ?> <?
                                              if (@$obj->_credor_devedor_id == $item->financeiro_credor_devedor_id):echo 'selected';
                                              endif;
                                              ?>><?php echo $item->razao_social; ?></option>
    <?php
}
?> 
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Conta</label>
                            <select name="conta" id="conta" class="form-control" >
                                <option value='' >Selecione</option>
<?php
$forma = $this->convenio->listarforma();
foreach ($forma as $item) {
    ?>

                                    <option   value =<?php echo $item->forma_entradas_saida_id; ?> <?
                                              if (@$obj->_conta_id == $item->forma_entradas_saida_id):echo 'selected';
                                              endif;
                                              ?>><?php echo $item->descricao; ?></option>
    <?php
}
?> 
                            </select>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Descrição
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Observações</label>
                            <textarea cols="" rows="" name="txtObservacao" class="form-control"><?= @$obj->_observacao; ?></textarea>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Enviar</button>
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                    </div>
                </div>

            </div>
        </div>
    </form> 

</div> <!-- Final da DIV content -->

<script type="text/javascript">



    var teste = '<? echo $obj->_tabela; ?>';
    if (teste == 'CBHPM' || teste == 'PROPRIA') {
        $("#procedimento1").prop('required', true);
        $("#procedimento2").prop('required', true);
    } else {
        $("#procedimento1").prop('required', false);
        $("#procedimento2").prop('required', false);
    }

    $(function () {
        $('#tipo').change(function () {
            if ($(this).val() == 'PROPRIA' || $(this).val() == 'CBHPM') {
                $("#procedimento1").prop('required', true);
                $("#procedimento2").prop('required', true);

            } else {
                $("#procedimento1").prop('required', false);
                $("#procedimento2").prop('required', false);
            }
        });
    });

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
            maxNumberOfElements: 20
        },
        theme: "bootstrap"
    };

    $("#txtCidade").easyAutocomplete(cidade);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL

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

    $('#txtCelular').mask('(99) 99999-9999');
    $('#txtTelefone').mask('(99) 9999-9999');
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Credor/Devedor
            </div>

            <!--</div>-->
        </div>
    </div>
     <form name="form_fornecedor" id="form_fornecedor" action="<?= base_url() ?>cadastros/fornecedor/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Credor/Devedor
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Razão Social (*)</label>
                            <input type="hidden" name="txtcadastrosfornecedorid" class="form-control" value="<?= @$obj->_financeiro_credor_devedor_id; ?>" />
                            <input type="text" name="txtrazaosocial" class="form-control" value="<?= @$obj->_razao_social; ?>" />

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" name="txtCNPJ" maxlength="14" alt="cnpj" class="form-control cnpj" value="<?= @$obj->_cnpj; ?>" />

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="txtCPF" maxlength="11" alt="cpf" class="form-control cpf" value="<?= @$obj->_cpf; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" id="cep" class="form-control eac-square" name="cep" value="<?= @$obj->_cep; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Endere&ccedil;o</label>
                            <input type="text" id="rua" class="form-control" name="endereco" value="<?= @$obj->_logradouro; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>N&uacute;mero</label>
                            <input type="text" id="numero" class="form-control" name="numero" value="<?= @$obj->_numero; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" id="bairro" class="form-control" name="bairro" value="<?= @$obj->_bairro; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" id="txtComplemento" class="form-control" name="complemento" value="<?= @$obj->_complemento; ?>" />

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" id="txtTelefone" class="form-control telefone" name="telefone" alt="phone" value="<?= @$obj->_telefone; ?>" />

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" id="txtCelular" class="form-control celular" name="celular" alt="phone" value="<?= @$obj->_celular; ?>" />

                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Município</label>
                            <input type="hidden" id="txtCidadeID" class="texto_id" name="municipio_id" value="<?= @$obj->_municipio_id; ?>" readonly="true" />
                            <input type="text" id="txtCidade" class="form-control" name="txtCidade" value="<?= @$obj->_nome; ?>" />
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

        </div><!-- Inicio da DIV content -->
    </form>

</div>
<!-- Final da DIV content -->


<script type="text/javascript">

    $(function () {
        $("#txtCidade").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=cidade",
            minLength: 3,
            focus: function (event, ui) {
                $("#txtCidade").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#txtCidade").val(ui.item.value);
                $("#txtCidadeID").val(ui.item.id);
                return false;
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



</script>
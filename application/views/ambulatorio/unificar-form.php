<form name="form_guia" id="form_guia" action="<?= base_url() ?>ambulatorio/exametemp/gravarunificar" method="post">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="panel panel-default">-->
                <div class="alert alert-success">
                    Unificar
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
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" id="txtNome" name="nome"  class="form-control" value="<?= $paciente['0']->nome; ?>" readonly/>

                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Sexo</label>
                            <input readonly type="text"  name="sexo" id="txtSexo"  class="form-control texto04"  value="<?
                            if ($paciente['0']->sexo == "M") {
                                echo 'Masculino';
                            } elseif ($paciente['0']->sexo == "F") {
                                echo 'Feminino';
                            } else {
                                echo 'Não Informado';
                            }
                            ?>"/>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Nascimento</label>
                            <input type="text" name="nascimento" id="txtNascimento" class="form-control" alt="date" value="<?php echo substr($paciente['0']->nascimento, 8, 2) . '/' . substr($paciente['0']->nascimento, 5, 2) . '/' . substr($paciente['0']->nascimento, 0, 4); ?>" onblur="retornaIdade()" readonly/>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Nome da Mãe</label>
                            <input type="text" name="nome_mae" id="txtNomeMae" class="form-control" value="<?= $paciente['0']->nome_mae; ?>" readonly/>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Paciente Que Será Unificado e Excluído
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Prontuário</label>
                            <input type="text" id="pacienteid" class="form-control texto02" name="pacienteid" readonly="true" />
                            <input type="hidden" id="paciente_id" name="paciente_id"  class="texto02" value="<?= $paciente_id; ?>"/>
                            <!--<input type="text" id="txtpaciente" required name="txtpaciente" class="form-control eac-square" onblur="calculoIdade(document.getElementById('nascimento').value)"  />-->
                        </div>


                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Paciente*</label>
                            <!--<input type="hidden" id="pacienteid" class="form-control texto02" name="pacienteid" readonly="true" />-->
                            <input type="text" id="txtpaciente" required name="txtpaciente" class="form-control eac-square" required  />
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

    </div>
</form>

<script type="text/javascript">
    $(function () {


//        $(function () {
//            $("#txtpaciente").autocomplete({
//                source: "<?= base_url() ?>index.php?c=autocomplete&m=pacienteunificar",
//                minLength: 3,
//                focus: function (event, ui) {
//                    $("#txtpaciente").val(ui.item.label);
//                    return false;
//                },
//                select: function (event, ui) {
//                    $("#txtpaciente").val(ui.item.value);
//                    $("#txtnome_mae").val(ui.item.mae);
//                    $("#txtdtnascimento").val(ui.item.valor);
//                    $("#pacienteid").val(ui.item.id);
//                    return false;
//                }
//            });
//        });
//        


        var paciente = {
//        url: "<?= base_url() ?>index.php?c=autocomplete&m=paciente",
            url: function (phrase) {
                if (phrase.length > 2) {
                    return "<?= base_url() ?>autocomplete/paciente?term=" + phrase;
                } else {
                    //duckduckgo doesn't support empty strings
//                return "http://api.duckduckgo.com/?q=empty&format=json";
                }
            },
            getValue: "value",
            list: {
                onSelectItemEvent: function () {
                    var value = $("#txtpaciente").getSelectedItemData().id;
//                var telefone = $("#txtpaciente").getSelectedItemData().itens;
//                var celular = $("#txtpaciente").getSelectedItemData().celular;
                    var nascimento = $("#txtpaciente").getSelectedItemData().valor;

                    $("#pacienteid").val(value).trigger("change");
//                $("#txtTelefone").val(telefone).trigger("change");
//                $("#txtCelular").val(celular).trigger("change");
                    $("#txtdtnascimento").val(nascimento).trigger("change");

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
                maxNumberOfElements: 10
            },
            requestDelay: 200,
            theme: "bootstrap"
        };

        $("#txtpaciente").easyAutocomplete(paciente);

        $(".competencia").accordion({autoHeight: false});
        $(".accordion").accordion({autoHeight: false, active: false});
        $(".lotacao").accordion({
            active: true,
            autoheight: false,
            clearStyle: true

        });


    });
</script>

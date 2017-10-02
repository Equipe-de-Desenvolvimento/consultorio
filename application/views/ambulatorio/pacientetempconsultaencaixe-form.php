<? $empresa_logada = $this->session->userdata('empresa_id'); ?>
<?$operador_id = $this->session->userdata('operador_id');?>
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Encaixar Atendimento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_exametemp" id="form_exametemp" action="<?= base_url() ?>ambulatorio/exametemp/gravarpacienteconsultaencaixe" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Atendimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2">

                        <div class="form-group ">
                            <label>Data</label>
                            <input type="text"  id="data_ficha" name="data_ficha" class="form-control"  required/>
                            <input type="hidden" name="txtpaciente_id"  value="<?= @$obj->_ambulatorio_pacientetemp_id; ?>" />
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Medico</label>
                            <select name="medico" id="medico" class="form-control" required>
                                <option value="" >Selecione</option>
                                <? foreach ($medico as $item) : ?>
                                    <option value="<?= $item->operador_id; ?>"<?if(@$operador_id == @$item->operador_id){
                                        echo 'selected';
                                    }?>><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Horarios</label>
                            <input type="text" id="horarios" alt="time" class="form-control" name="horarios" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Observa&ccedil;&otilde;es</label>
                            <input type="text" id="observacoes" class="form-control" name="observacoes" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Paciente
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" id="txtNomeid" class="texto_id" name="txtNomeid" readonly="true" />
                            <input type="text" id="txtNome" name="txtNome" class="form-control eac-square" required/>
                        </div>

                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Dt de nascimento</label>
                            <input type="text" name="nascimento" id="nascimento" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" id="txtTelefone" class="form-control" name="txtTelefone"/>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" id="txtCelular" class="form-control" name="txtCelular"/>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-10">
                        <div class="form-group">
                            <label>End.</label>
                            <input type="text" id="txtEnd" class="form-control" name="txtEnd"  />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Convenio *</label>
                            <select name="convenio" id="convenio" class="form-control" required>
                                <option  value="0">Selecione</option>
                                <? foreach ($convenio as $value) : ?>
                                    <option value="<?= $value->convenio_id; ?>"><?php echo $value->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Procedimento</label>
                            <select  name="procedimento" id="procedimento" class="form-control" required>
                                <option value="">Selecione</option>
                            </select>
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
</fieldset>


</div> <!-- Final da DIV content -->
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

            if (code > 57 || (code < 48 && code != 0 && code != 8 && code != 9)) {
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
//    mascaraTelefone(form_exametemp.txtTelefone);
//    mascaraTelefone(form_exametemp.txtCelular);


    $(function () {
        $("#data_ficha").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

//    $(function () {
//        $("#txtNome").autocomplete({
//            source: "<?= base_url() ?>index.php?c=autocomplete&m=paciente",
//            minLength: 3,
//            focus: function (event, ui) {
//                $("#txtNome").val(ui.item.label);
//                return false;
//            },
//            select: function (event, ui) {
//                $("#txtNome").val(ui.item.value);
//                $("#txtNomeid").val(ui.item.id);
//                $("#txtTelefone").val(ui.item.itens);
//                $("#txtCelular").val(ui.item.celular);
//                $("#nascimento").val(ui.item.valor);
//                $("#txtEnd").val(ui.item.endereco);
//                return false;
//            }
//        });
//    });

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
                var value = $("#txtNome").getSelectedItemData().id;
                var telefone = $("#txtNome").getSelectedItemData().itens;
                var celular = $("#txtNome").getSelectedItemData().celular;
                var nascimento = $("#txtNome").getSelectedItemData().valor;
                var endereco = $("#txtNome").getSelectedItemData().endereco;

                $("#txtNomeid").val(value).trigger("change");
                $("#txtTelefone").val(telefone).trigger("change");
                $("#txtCelular").val(celular).trigger("change");
                $("#nascimento").val(nascimento).trigger("change");
                $("#txtEnd").val(endereco).trigger("change");

//                mascaraTelefone(form_exametemp.txtTelefone);
//                mascaraTelefone(form_exametemp.txtCelular);

            },
            match: {
                enabled: true
            },
//            template: {
//                type: "iconLeft",
//                fields: {
//                    iconSrc: "icon"
//                }
//            },
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

    $("#txtNome").easyAutocomplete(paciente);


    jQuery("#txtCelular")
            .mask("(99) 9999-9999?9")
            .change(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });
    jQuery("#txtTelefone")
            .mask("(99) 9999-9999?9")
            .change(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });

    $(function () {
        $('#convenio').change(function () {
            if ($(this).val()) {
                $('.carregando').show();
                $.getJSON('<?= base_url() ?>autocomplete/procedimentoconvenioconsulta', {convenio1: $(this).val(), ajax: true}, function (j) {
                    options = '<option value=""></option>';
                    for (var c = 0; c < j.length; c++) {
                        options += '<option value="' + j[c].procedimento_convenio_id + '">' + j[c].procedimento + '</option>';
                    }
                    $('#procedimento').html(options).show();
                    $('.carregando').hide();
                });
            } else {
                $('#procedimento').html('<option value="">Selecione</option>');
            }
        });
    });

    $(function () {
        $("#accordion").accordion();
    });


    $(document).ready(function () {
        jQuery('#form_exametemp').validate({
            rules: {
                data_ficha: {
                    required: true
                },
                horarios: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                data_ficha: {
                    required: "*"
                },
                horarios: {
                    required: "*",
                    minlength: "!"
                }
            }
        });
    });

//    jQuery("#txtTelefone").mask("(99) 9999-9999");
//    jQuery("#txtCelular").mask("(99) 99999-9999");
    jQuery("#nascimento").mask("99/99/9999");
    jQuery("#horarios").mask("99:99");



</script>

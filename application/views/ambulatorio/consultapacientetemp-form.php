<div id="page-wrapper"> <!-- Inicio da DIV content -->

    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Marcar Atendimento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_exametemp" id="form_exametemp" action="<?= base_url() ?>ambulatorio/exametemp/gravarconsultapacientetemp" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Paciente
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="txtNome" read class="form-control" value="<?= @$obj->_nome; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Dt de nascimento</label>

                            <input type="text" name="nascimento" id="txtNascimento" class="form-control" alt="date" value="<?php echo substr(@$obj->_nascimento, 8, 2) . '/' . substr(@$obj->_nascimento, 5, 2) . '/' . substr(@$obj->_nascimento, 0, 4); ?>"/>
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Convenio</label>
                            <input type="text" id="txtconvenio" class="form-control" name="convenio" value="<?= @$obj->_descricaoconvenio; ?>" />
                        </div>


                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>End.</label>
                            <input type="text" id="txtEnd" class="form-control" name="txtEnd"  value="<?= @$obj->_endereco; ?> - <?= @$obj->_numero; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" id="txtTelefone" class="form-control" name="telefone" value="<?= @$obj->_telefone; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" id="txtCelular" class="form-control" name="celular" value="<?= @$obj->_celular; ?>" />
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <a class="btn btn-outline btn-primary btn-sm" href="<?= base_url() ?>cadastros/pacientes/carregar/<?= @$obj->_paciente_id ?>" target="_blank">
                            Editar
                        </a> 
                    </div>
                </div>




            </div>

        </div>
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Agendamento
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Data</label>
                            <input type="text"  id="data_ficha" name="data_ficha" class="form-control" required />
                            <input type="hidden" name="txtpaciente_id" value="<?= @$obj->_paciente_id; ?>" />
                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Medico</label>
                            <select name="exame" id="exame" class="form-control" required>
                                <option value="" >Selecione</option>
                                <? foreach ($medico as $item) : ?>
                                    <option value="<?= $item->operador_id; ?>"><?= $item->nome; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Horarios</label>
                            <select name="horarios" id="horarios" class="form-control" required>
                                <option value="" >-- Escolha um horário --</option>
                            </select>
                        </div>


                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-2">
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
                            <label>Procedimento*</label>
                            <select  name="procedimento" id="procedimento" class="form-control" required>
                                <option value="">Selecione</option>
                            </select>
                        </div>


                    </div>


                </div>
                <div class="row">

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Observações</label>
                            <textarea id="observacoes" class="form-control" name="observacoes"></textarea>
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


    <?
    if ($contador > 0) {
        ?>
        <div class="row">
            <div class="col-lg-12">


                <div class="panel panel-default ">
                    <div class="alert alert-info">
                        Agendamentos
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">


                            <table class="table table-striped table-hover" border="0">
                                <thead>

                                    <tr>
                                        <th class="tabela_header">Data</th>
                                        <th class="tabela_header">Hora</th>
                                        <th class="tabela_header">M&eacute;dico</th>
                                        <th class="tabela_header">Observa&ccedil;&otilde;es</th>
                                        <th class="tabela_acoes" colspan="2">Ações</th>
                                    </tr>
                                </thead>
                                <?
                                $estilo_linha = "tabela_content01";
                                foreach ($exames as $item) {
                                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                                    ?>

                                    <tr>
                                        <td class="<?php echo $estilo_linha; ?>"><?= substr($item->data, 8, 2) . '/' . substr($item->data, 5, 2) . '/' . substr($item->data, 0, 4); ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->inicio; ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><?= $item->sala . "-" . $item->medico; ?></td>
                                        <td class="<?php echo $estilo_linha; ?>"><a  onclick="javascript:window.open('<?= base_url() ?>ambulatorio/exame/alterarobservacao/<?= $item->agenda_exames_id ?>', '_blank', 'toolbar=no,Location=no,menubar=no,\n\
                                                                                                                                                                                                                                                        width=500,height=230');">=><?= $item->observacoes; ?></a></td>
                                        <td class="tabela_acoes">
                                            <? if (empty($faltou)) { ?>


                                                <a class="btn btn-outline btn-danger btn-sm" onclick="javascript: return confirm('Deseja realmente excluir a consulta?');" href="<?= base_url() ?>ambulatorio/exametemp/excluirconsultatemp/<?= $item->agenda_exames_id; ?>/<?= @$obj->_paciente_id; ?>">
                                                    Excluir</a>

                                            <? } ?>

                                            <a class="btn btn-outline btn-info btn-sm"  href="<?= base_url() ?>ambulatorio/exametemp/reservarconsultatemp/<?= $item->agenda_exames_id; ?>/<?= @$obj->_paciente_id; ?>/<?= $item->medico_consulta_id; ?>/<?= $item->data; ?>">
                                                Reservar</a></td>

                                    </tr>


                                <? }
                                ?>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <? }
    ?>


    <div class="row">
        <div class="col-lg-12">



            <? if (count($consultasanteriores) > 0) { ?>
                <div class="panel panel-default ">
                    <div class="alert alert-info">
                        Atendimentos Antigos
                    </div>
                    <div class="panel-body">


                        <?
                        foreach ($consultasanteriores as $value) {
                            $data_atual = date('Y-m-d');
                            $data1 = new DateTime($data_atual);
                            $data2 = new DateTime($value->data);

                            $intervalo = $data1->diff($data2);
                            ?>
                            <h6><b><?= $intervalo->days ?> dia(s)</b>&nbsp;&nbsp;&nbsp;-ULTIMA ATENDIMENTO: <?= $value->procedimento; ?> - DATA: <b><?= substr($value->data, 8, 2) . '/' . substr($value->data, 5, 2) . '/' . substr($value->data, 0, 4); ?> </b> - M&eacute;dico: <b> <?= $value->medico; ?></b> - Convenio:  <?= $value->convenio; ?></h6>

                        <? }
                        ?>
                    </div>
                </div>  
            <? } else {
                ?>
                <div class="panel panel-default ">
                    <div class="alert alert-info">
                        Atendimentos Antigos
                    </div>
                    <div class="panel-body">
                        <h6>NENHUMA ATENDIMENTO ENCONTRADO</h6>
                    </div>
                </div>
                <?
            }
            ?>
        </div>
    </div>



</div> <!-- Final da DIV content -->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>-->
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
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
    mascaraTelefone(form_exametemp.txtTelefone);
    mascaraTelefone(form_exametemp.txtCelular);

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

    $(function () {
        $('#exame').change(function () {
            if ($(this).val()) {
                $('#horarios').hide();
                $('.carregando').show();
                $.getJSON('<?= base_url() ?>autocomplete/horariosambulatorioconsulta', {exame: $(this).val(), teste: $("#data_ficha").val()}, function (j) {
                    var options = '<option value=""></option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].agenda_exames_id + '">' + j[i].inicio + '</option>';
                    }
                    $('#horarios').html(options).show();
                    $('.carregando').hide();
                });
            } else {
                $('#horarios').html('<option value="">-- Escolha um hora --</option>');
            }
        });
    });





    //$(function(){     
    //    $('#exame').change(function(){
    //        exame = $(this).val();
    //        if ( exame === '')
    //            return false;
    //        $.getJSON( <?= base_url() ?>autocomplete/horariosambulatorio, exame, function (data){
    //            var option = new Array();
    //            $.each(data, function(i, obj){
    //                console.log(obl);
    //                option[i] = document.createElement('option');
    //                $( option[i] ).attr( {value : obj.id} );
    //                $( option[i] ).append( obj.nome );
    //                $("select[name='horarios']").append( option[i] );
    //            });
    //        });
    //    });
    //});





    $(function () {
        $("#accordion").accordion();
    });


    $(document).ready(function () {
        jQuery('#form_exametemp').validate({
            rules: {
                txtNome: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                txtNome: {
                    required: "*",
                    minlength: "!"
                }
            }
        });
    });

    function calculoIdade() {
        var data = document.getElementById("txtNascimento").value;
        var ano = data.substring(6, 12);
        var idade = new Date().getFullYear() - ano;
        document.getElementById("idade2").value = idade;
    }

    calculoIdade();

</script>

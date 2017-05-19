<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="panel panel-default">
        <div class="alert alert-danger">Excluir Agenda</div>

        <div class="panel-body">
            <form name="form_exame" id="form_exame" action="<?= base_url() ?>ambulatorio/agenda/excluir/<?= @$obj->_agenda_id; ?>" method="post">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Nome</label>


                            <input type="hidden" name="txthorariostipoID" value="<?= @$obj->_agenda_id; ?>" />
                            <input type="text" readonly="" name="txtNome" class="form-control bestupper" value="<?= @$obj->_nome; ?>" />
                        </div>


                    </div>    


                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="excluiragendamentos">Excluir horários no agendamento</label>
                        <input type="checkbox"  id="excluiragendamentos" name="excluir" alt="date" class="checkbox" />
                    </div>
                </div>

                <!--<hr/>-->

                <!--<button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>-->
            </form>
            <div class="row">
                <div class="col-lg-3">

                    <p>
                        <button class="btn btn-outline btn-success btn-sm" id="enviar" name=""><i class="fa fa-floppy-o fa-fw"></i> Enviar</button>
                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });

//    $('#excluiragendamentos').click(function () {
//        alert('something');
//    });
//    $('#excluiragendamentos').change(function () {
//        if ($(this).is(":checked")) {
//
//            $('#agendamentos').show();
//            
//            $("#txtdatainicial").prop('required', true);
//            $("#txtdatafinal").prop('required', true);
//            $("#txtmedico").prop('required', true);
//        } else {
//
//            $('#agendamentos').hide();
//            
//            $("#txtdatainicial").prop('required', false);
//            $("#txtdatafinal").prop('required', false);
//            $("#txtmedico").prop('required', false);
//
//        }
//    });

    $('#enviar').click(function () {

        if ($('#excluiragendamentos').is(":checked")) {

        swal({
            title: "Tem certeza?",
            text: "Você selecionou que irá deletar os horários associados a essa agenda no agendamento! Obs: Isso não irá deletar os pacientes que já estão agendados.",
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
                        document.getElementById('form_exame').submit();
                    } else {
                        swal("Cancelado", "Você desistiu de excluir os horários associados a essa agenda no agendamento. Caso queira excluir apenas a agenda, desmarque a opção e tente novamente", "error");
                    }
                });

        }else{
            document.getElementById('form_exame').submit();
        }

        



    });


    $(function () {
        $("#txtdatainicial").datepicker({
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
        $("#txtdatafinal").datepicker({
            autosize: true,
            changeYear: true,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            buttonImage: '<?= base_url() ?>img/form/date.png',
            dateFormat: 'dd/mm/yy'
        });
    });

    $(document).ready(function () {
        jQuery('#form_horariostipo').validate({
            rules: {
                txtNome: {
                    required: true,
                    minlength: 3
                },
                txtTipo: {
                    required: true
                }
            },
            messages: {
                txtNome: {
                    required: "*",
                    minlength: "!"
                },
                txtTipo: {
                    required: "*"
                }
            }
        });
    });

</script>
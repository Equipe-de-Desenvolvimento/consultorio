<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="pt-BR" >-->





<div id="page-wrapper">
    <script>
        var myjson;
//        $.getJSON("<?= base_url() ?>autocomplete/listarhorarioscalendario", json);
//            myjson = json;
//        function json(data) {
//
//            alert(data);
//        }
//        });
//        var myjson = '22';
//        console.log(myjson);
    </script>

    <style>

        body {
            /*margin: 40px 10px;*/
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
    <?
    $medicos = $this->operador_m->listarmedicos();
//    $especialidade = $this->exame->listarespecialidade();
//    $empresas = $this->exame->listarempresas();
//    $empresa_logada = $this->session->userdata('empresa_id');
    ?>
    <div class="panel panel-default">

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="pesquisar">
                    <form method="post" id="form" action="<?php echo base_url() ?>ambulatorio/exame/listarmultifuncaoconsultacalendario">
                        <table width="60%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Medico</th>
                                <th class="text-center">Ações</th>
                            </tr> 
                            <tr class="">


                                <td>
                                    <select name="medico" id="medico" class="form-control texto06">
                                        <option value="">TODOS</option>
                                        <? foreach ($medicos as $value) : ?>
                                            <option value="<?= $value->operador_id; ?>"<?
                                            if (@$_POST['medico'] == $value->operador_id):echo 'selected';
                                            endif;
                                            ?>>

                                                <?php echo $value->nome . ' - CRM: ' . $value->conselho; ?>


                                            </option>
                                        <? endforeach; ?>

                                    </select>
                                </td>
                                <td style="text-align: center;"><button type="submit" class="btn btn-default btn-outline btn-danger" name="enviar"><i class="fa fa-search fa-1x"></i></button></td>
                            </tr> 
                        </table> 
                    </form>


                </div>
            </div>
        </div>
        <div class="panel-heading ">
            Calendário
        </div>
        <div class="row">
            <div class="col-lg-12">



                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id='calendar'></div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>




</div >
<script>
//alert($('#medico').val());


//    function date() {


    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        dayClick: function (date) {
            var data = date.format();

            window.open('<?= base_url() ?>ambulatorio/exame/listarmultifuncaoconsulta?empresa=&especialidade=&medico=&situacao=&data='+moment(data).format('DD%2FMM%2FYYYY')+'&nome=', '_self');



        },
//        eventDragStop: function (date, jsEvent, view) {
////            alert(date.format());
//        },
//        navLinks: true,
        showNonCurrentDates: false,
//            weekends: false,

//                navLinks: true, // can click day/week names to navigate views
        defaultDate: '<?= date('Y-m-d') ?>',
        locale: 'pt-br',
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        schedulerLicenseKey: 'CC-Attribution-Commercial-NoDerivatives',

//            events: '<?= base_url() ?>autocomplete/listarhorarioscalendario',

        eventSources: [

            // your event source

            {

                url: '<?= base_url() ?>autocomplete/listarhorarioscalendario',
                type: 'POST',
                data: {
                    medico: $('#medico').val()
//                        custom_param2: 'somethingelse'
                },
                error: function () {
                    alert('there was an error while fetching events!');
                }
//                    color: 'yellow', // a non-ajax option
//                    textColor: 'black' // a non-ajax option
            }

            // any other sources...

        ]

    });

//    }


//    $(document).ready(function () {



//            $.getJSON("<?= base_url() ?>autocomplete/listarhorarioscalendario", json);
//            function json(data) {


//            }

//    });
    $('#medico').change(function () {
    document.getElementById('form').submit();
    });
//date();
//$('#medico').change(function () {
//    
//});
$('#calendar').fullCalendar({
	
});
</script>



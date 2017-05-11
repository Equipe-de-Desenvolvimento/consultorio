<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="pt-BR" >-->
<link href="<?= base_url() ?>bootstrap/fullcalendar/fullcalendar.css" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url() ?>bootstrap/fullcalendar/lib/moment.min.js"></script>
<script src="<?= base_url() ?>bootstrap/fullcalendar/locale/pt-br.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>bootstrap/fullcalendar/fullcalendar.js" type="text/javascript" charset="utf-8"></script>




<div id="page-wrapper">
    <script>

    </script>
    <script>

        $(document).ready(function () {
            var initialLocaleCode = 'pt-br';
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
//                navLinks: true, // can click day/week names to navigate views
                defaultDate: '<?= date('Y-m-d') ?>',
                locale: initialLocaleCode,
                editable: false,
//                eventLimit: true, // allow "more" link when too many events
                events: {
				url: '<?= base_url() ?>autocomplete/listarhorarioscalendario',
				error: function() {
					alert('asd');
				}
			},
                
//                eventClick: function (event) {
//
////                    alert('Clicked on: ' + event.start);
//
////                    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
////                    alert('Current view: ' + id);
//
//                    // change the day's background color just for fun
////                    $(this).css('background-color', 'red');
//
//                }
            });

        });

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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="table-responsive" id="pesquisar">
                    <form method="get" action="<?php echo base_url() ?>ambulatorio/exame/listarmultifuncaoconsulta">
                        <table width="60%" class="table " id="dataTables-example">
                            <tr class="info">
                                <th>Medico</th>
                                <th class="text-center">Ações</th>
                            </tr> 
                            <tr class="">
                                

                                <td>
                                    <select name="medico" id="medico" class="form-control texto06">
                                        <option value=""> </option>
                                        <? foreach ($medicos as $value) : ?>
                                            <option value="<?= $value->operador_id; ?>"<?
                                            if (@$_GET['medico'] == $value->operador_id):echo 'selected';
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
                <div class="panel-heading ">
                    Calendário
                </div>
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



    
</div>




<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <!--    <div class="bt_link_voltar">
            <a href="<?= base_url() ?>ambulatorio/agenda">
                Voltar
            </a>
        </div>-->
    <div class="panel panel-default">
        <div class="alert alert-info">Cadastro de Horario Fixo</div>
        <div class="panel-body">

            <div>
                <form name="form_horarioagenda" id="form_horarioagenda" action="<?= base_url() ?>ambulatorio/agenda/gravarhorarioagenda" method="post">

                    <div>
                        <dd>
                            <input type="hidden" id="txthorariostipoID" name="txtagendaID" value="<?= $agenda_id; ?>" />
                        </dd>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="tabela-agenda">
                            <tr>
                                <th>Dia</th>
                                <th>Inicio</th>
                                <th>Fim</th>
                                <th>Inicio intervalo</th>
                                <th>Fim do intervalo</th>
                                <th>Tempo Consulta</th>
                                <th>QTDE Consulta</th>
                                <th>Ações</th>
                                <!--<th>Empresa</th>-->
                            </tr>
                            <tr>
                                <td>                
                                    <select name="txtDia[1]" id="txtData" class='form-control'>
                                        <option value=""></option>
                                        <option value="1 - Segunda">1 - Segunda</option>
                                        <option value="2 - Terça">2 - Terça</option>
                                        <option value="3 - Quarta">3 - Quarta</option>
                                        <option value="4 - Quinta">4 - Quinta</option>
                                        <option value="5 - Sexta">5 - Sexta</option>
                                        <option value="6 - Sabado">6 - Sabado</option>
                                        <option value="7 - Domingo">7 - Domingo</option>
                                    </select>
                                </td>
                                <td><input type='text'  id="txthoraEntrada1" name="txthoraEntrada[1]" alt='time' class='form-control' /></td>
                                <td><input type='text'  id='txthoraSaida1' name="txthoraSaida[1]" alt='time' class='form-control' /></td>
                                <td><input type='text'  id="txtIniciointervalo" name="txtIniciointervalo[1]" alt='time' value='00:00' class='form-control' /></td>
                                <td><input type='text'  id="txtFimintervalo" name="txtFimintervalo[1]" alt='time' value='00:00' class='form-control' /></td>
                                <td><input type='text'  id="txtTempoconsulta" name="txtTempoconsulta[1]" class='form-control' /></td>
                                <td><input type='text'  id="txtQtdeconsulta" name="txtQtdeconsulta[1]" value='0' class='form-control' /></td>

                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <a class="btn btn-success btn-sm" href="#" id="plusInfusao">Adicionar Ítem</a>
                        </div>
                    </div>
                    <br/><br/>
                    <table>
                        <tr>
                            <td>
                                <textarea rows="2" cols="50" placeholder="obs..." value="" name="obs"></textarea>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <button type="submit" name="btnEnviar">Enviar</button>
                    <button type="reset" name="btnLimpar">Limpar</button>
                    <button type="button" id="btnVoltar" name="btnVoltar">Voltar</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<script type="text/javascript">
//    $(function () {
//        $("#data_ficha").datepicker({
//            autosize: true,
//            changeYear: true,
//            changeMonth: true,
//            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
//            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
//            buttonImage: '<?= base_url() ?>img/form/date.png',
//            dateFormat: 'dd/mm/yy'
//        });
//    });

    $('#plusInfusao').click(function () {
//    alert('asdsa');
//        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    var idlinha = 2;
    var classe = 2;

    $(document).ready(function () {



        $('#plusInfusao').click(function () {
//            alert('asd');

            var linha = "<tr>";
            linha += "<td>";
            linha += "<select  name='txtDia[" + idlinha + "]' class='form-control'>";
            linha += "<option value=''></option>";
            linha += "<option value='1 - Segunda'>1 - Segunda</option>";
            linha += "<option value='2 - Terça'>2 - Terça</option>";
            linha += "<option value='3 - Quarta'>3 - Quarta</option>";
            linha += "<option value='4 - Quinta'>4 - Quinta</option>";
            linha += "<option value='5 - Sexta'>5 - Sexta</option>";
            linha += "<option value='6 - Sabado'>6 - Sabado</option>";
            linha += "<option value='7 - Domingo'>7 - Domingo</option>";
            linha += "</select>";
            linha += "</td>";

            linha += "<td><input type='text'  id='txthoraEntrada1[" + idlinha + "]' name='txthoraEntrada[" + idlinha + "]' alt='time' class='form-control' /></td>";
            linha += "<td><input type='text'  id='txthoraSaida1' name='txthoraSaida[" + idlinha + "]' alt='time' class='form-control' /></td>";
            linha += "<td><input type='text'  id='txtIniciointervalo' name='txtIniciointervalo[" + idlinha + "]' alt='time' value='00:00' class='form-control' /></td>";
            linha += "<td><input type='text'  id='txtFimintervalo' name='txtFimintervalo[" + idlinha + "]' alt='time' value='00:00' class='form-control' /></td>";
            linha += "<td><input type='text'  id='txtTempoconsulta' name='txtTempoconsulta[" + idlinha + "]' class='form-control' /></td>";
            linha += "<td><input type='text'  id='txtQtdeconsulta' name='txtQtdeconsulta[" + idlinha + "]' value='0' class='form-control' /></td>";
            linha += "<td>";
            linha += "<a href='#' class='delete'>Excluir</a>";
            linha += "</td>";
            linha += "</tr>";
//            alert(linha);

            idlinha++;
            classe = (classe == 1) ? 2 : 1;
            $('#tabela-agenda').append(linha);
            addRemove();
            return false;
        });

//            $('#plusObs').click(function () {
//                var linha2 = '';
//                idlinha2 = 0;
//                classe2 = 1;
//
//                linha2 += '<tr class="classe2"><td>';
//                linha2 += '<input type='text' name="DataObs[' + idlinha2 + ']" />';
//                linha2 += '</td><td>';
//                linha2 += '<input type='text' name="DataObs[' + idlinha2 + ']" />';
//                linha2 += '</td><td>';
//                linha2 += '<input type='text' name="DataObs[' + idlinha2 + ']" />';
//                linha2 += '</td><td>';
//                linha2 += '<input type='text' name="DataObs[' + idlinha2 + ']" class="size4" />';
//                linha2 += '</td><td>';
//                linha2 += '<a href="#" class="delete">X</a>';
//                linha2 += '</td></tr>';
//
//                idlinha2++;
//                classe2 = (classe2 == 1) ? 2 : 1;
//                $('#table_obsserv').append(linha2);
//                addRemove();
//                return false;
//            });

        function addRemove() {
            $('.delete').click(function () {
                $(this).parent().parent().remove();
                return false;
            });

        }
    });

</script>
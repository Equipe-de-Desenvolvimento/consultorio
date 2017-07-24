<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="panel panel-default">
        <div class="alert alert-danger">
            Cancelar Atendimento
        </div>
        <!--<h3 class="singular"><a href="#"></a></h3>-->
        <div class="panel-body">
            <form name="form_exameespera" id="form_exameespera" action="<?= base_url() ?>ambulatorio/exame/cancelarguia" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Motivo</label>

                            <input type="hidden" name="txtagenda_exames_id" value="<?= $agenda_exames_id; ?>" />
                            <input type="hidden" name="txtprocedimento_tuss_id" value="<?= $procedimento_tuss_id; ?>" />
                            <input type="hidden" name="txtpaciente_id" value="<?= $paciente_id; ?>" />
                            <select name="txtmotivo" id="txtmotivo" class="form-control">
                                <? foreach ($motivos as $item) : ?>
                                    <option value="<?= $item->ambulatorio_cancelamento_id; ?>"><?= $item->descricao; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Observacao</label>
                            <textarea id="observacaocancelamento" class="form-control" name="observacaocancelamento" cols="88" rows="3" ></textarea>
                        </div>
                    </div>
                </div>

                <br>
                
                <div class="row">
                    <div class="col-lg-3">
                    <p>
                        <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Enviar</button>

                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                    </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- Final da DIV content -->

<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(function () {
        $("#txtprocedimentolabel").autocomplete({
            source: "<?= base_url() ?>index.php?c=autocomplete&m=paciente",
            minLength: 3,
            focus: function (event, ui) {
                $("#txtpacientelabel").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#txtpacientelabel").val(ui.item.value);
                $("#txtpacienteid").val(ui.item.id);
                return false;
            }
        });
    });

    $(document).ready(function () {
        jQuery('#form_exameespera').validate({
            rules: {
                txtsalas: {
                    required: true
                },
                txttecnico: {
                    required: true
                }
            },
            messages: {
                txtsalas: {
                    required: "*"
                },
                txttecnico: {
                    required: "*"
                }
            }
        });
    });

</script>
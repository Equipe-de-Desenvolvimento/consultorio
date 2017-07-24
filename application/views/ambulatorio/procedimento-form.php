<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12">
            <!--<div class="panel panel-default">-->
            <div class="alert alert-success">
                Cadastro de Procedimento
            </div>

            <!--</div>-->
        </div>
    </div>
    <form name="form_procedimento" id="form_procedimento" action="<?= base_url() ?>ambulatorio/procedimento/gravar" method="post">
    <div class="panel panel-default ">
        <div class="alert alert-info">
            Dados do Procedimento
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div >
                        <label>Nome*</label>
                        <input type="hidden" name="txtprocedimentotussid" value="<?= @$obj->_procedimento_tuss_id; ?>" />
                        <input type="text" required name="txtNome" class="form-control texto10" value="<?= @$obj->_nome; ?>" />
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div >
                        <label>Procedimento*</label>
                        <input type="hidden" name="txtprocedimento" id="txtprocedimento" class="size2" value="<?= @$obj->_tuss_id; ?>"  />
                        <input type="hidden" name="txtcodigo" id="txtcodigo" class="size2" value="<?= @$obj->_codigo; ?>" />
                        <input type="hidden" name="txtdescricao" id="txtdescricao" class="size2" value="<?= @$obj->_descricao; ?>"  />
                        <input type="text" name="txtprocedimentolabel" id="txtprocedimentolabel" required="" class="form-control" value="<?= @$obj->_descricao; ?>" />
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >
                        <label>Grupo</label>
                        <select name="grupo" id="grupo" class="form-control" required="" >
                            <option value='' >Selecione</option>
                            <? foreach ($grupos as $grupo) { ?>                                
                                <option value='<?= $grupo->nome ?>' <?
                                if (@$obj->_grupo == $grupo->nome):echo 'selected';
                                endif;
                                ?>><?= $grupo->nome ?></option>
                                    <? } ?>
                        </select>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Perc./Valor Medico</label>
                        <input type="text" name="txtperc_medico" id="txtperc_medico" required class="form-control" value="<?= @$obj->_perc_medico; ?>" />
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Percentual</label>
                        <select name="percentual" id="percentual" class="form-control">
                            <option value="" <?
                            if (@$obj->_percentual == ""):echo 'selected';
                            endif;
                            ?>>Selecione</option>
                            <option value="1" <?
                            if (@$obj->_percentual == "t"):echo 'selected';
                            endif;
                            ?>>SIM</option>
                            <option value="0" <?
                            if (@$obj->_percentual == "f"):echo 'selected';
                            endif;
                            ?>>N&Atilde;O</option>
                        </select>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Médico</label>
                        <select name="medico" id="medico" class="form-control">
                            <option value="" <?
                            if (@$obj->_medico == ""):echo 'selected';
                            endif;
                            ?>>Selecione</option>
                            <option value="1" <?
                            if (@$obj->_medico == "t"):echo 'selected';
                            endif;
                            ?>>SIM</option>
                            <option value="0" <?
                            if (@$obj->_medico == "f"):echo 'selected';
                            endif;
                            ?>>N&Atilde;O</option>
                        </select>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Home Care</label>
                        <select name="homecare" id="homecare" class="form-control">
                            <option value="" <?
                            if (@$obj->_home_care == ""):echo 'selected';
                            endif;
                            ?>>Selecione</option>
                            <option value="1" <?
                            if (@$obj->_home_care == "t"):echo 'selected';
                            endif;
                            ?>>SIM</option>
                            <option value="0" <?
                            if (@$obj->_home_care == "f"):echo 'selected';
                            endif;
                            ?>>N&Atilde;O</option>
                        </select>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Quantidade de Sessões</label>
                        <input type="text" name="txtqtde" class="form-control" value="<?= @$obj->_qtde; ?>" />
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div >

                        <label>Prazo de Entrega</label>
                        <input type="text" name="entrega" class="form-control" value="<?= @$obj->_entrega; ?>" />
                    </div>


                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div >
                        <label>Texto</label>
                        <textarea  type="text" name="descricao" id="descricao" class="form-control" cols="60" rows="5" ><?= @$obj->_descricao_procedimento; ?> </textarea>

                    </div>


                </div>
            </div>
            <br>
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

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>-->
<script type="text/javascript">

//    $(function () {
//        $("#txtprocedimentolabel").autocomplete({
//            source: "<?= base_url() ?>index.php?c=autocomplete&m=procedimentotuss",
//            minLength: 3,
//            focus: function (event, ui) {
//                $("#txtprocedimentolabel").val(ui.item.label);
//                return false;
//            },
//            select: function (event, ui) {
//                $("#txtprocedimentolabel").val(ui.item.value);
//                $("#txtprocedimento").val(ui.item.id);
//                $("#txtcodigo").val(ui.item.codigo);
//                $("#txtdescricao").val(ui.item.descricao);
//                return false;
//            }
//        });
//    });
    
    
    // NOVOS AUTOCOMPLETES.
    // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
    // Url é a função que vai trazer o JSON.
    // getValue é onde se define o nome do campo que você quer que apareça na lista
    // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
    // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
    // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
    // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
    // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

    var procedimento = {
        url: "<?= base_url() ?>index.php?c=autocomplete&m=procedimentotuss",
        getValue: "value",
        list: {
            onSelectItemEvent: function () {
                var procedimento_id = $("#txtprocedimentolabel").getSelectedItemData().id;
                var codigo = $("#txtprocedimentolabel").getSelectedItemData().codigo;
                var descricao = $("#txtprocedimentolabel").getSelectedItemData().descricao;

                $("#txtprocedimento").val(procedimento_id).trigger("change");
                $("#txtcodigo").val(codigo).trigger("change");
                $("#txtdescricao").val(descricao).trigger("change");
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

    $("#txtprocedimentolabel").easyAutocomplete(procedimento);
    // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL


</script>
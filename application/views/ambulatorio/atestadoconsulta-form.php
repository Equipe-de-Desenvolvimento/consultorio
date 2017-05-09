<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="STG SAUDE">
    <title>Atestado</title>
    <!--CSS PADRAO DO BOOTSTRAP COM ALGUMAS ALTERAÇÕES DO TEMA-->
    <link href="<?= base_url() ?>bootstrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/dist/css/sb-admin-2.css" rel="stylesheet" />
    <!--BIBLIOTECA RESPONSAVEL PELOS ICONES-->
    <link href="<?= base_url() ?>bootstrap/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!--DEFINE TAMANHO MAXIMO DOS CAMPOS-->
    <link href="<?= base_url() ?>css/form.css" rel="stylesheet" type="text/css" />
    <!--AUTOCOMPLETE NOVO-->
    <link href="<?= base_url() ?>bootstrap/vendor/autocomplete/easy-autocomplete.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>bootstrap/vendor/autocomplete/easy-autocomplete.themes.css" rel="stylesheet" type="text/css" />
    <!--CSS DO ALERTA BONITINHO-->
    <link href="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.css" rel="stylesheet" type="text/css" />


    <link href="<?= base_url() ?>bootstrap/vendor/clock/compiled/flipclock.css" rel="stylesheet" />
</head>
<?
$dataFuturo = date("Y-m-d");
$dataAtual = @$obj->_nascimento;
$date_time = new DateTime($dataAtual);
$diff = $date_time->diff(new DateTime($dataFuturo));
$teste = $diff->format('%Ya %mm %dd');

if (count($receita) == 0) {
    $receituario_id = 0;
    $texto = "";
    $medico = "";
} else {
    $texto = $receita[0]->texto;
    $receituario_id = $receita[0]->ambulatorio_atestado_id;
    $medico = $receita[0]->medico_parecer1;
}
$operador_id = $this->session->userdata('operador_id');
?>
<div class="container-fluid">

    <form name="form_laudo" id="form_laudo" action="<?= base_url() ?>ambulatorio/laudo/gravaratestado/<?= $ambulatorio_laudo_id ?>" method="post">



        <div class="row">
            <div class="col-lg-12"> 
                <div class="alert alert-success ">
                    Atestado
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Dados do Paciente
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table"> 
                                <input type="hidden" name="guia_id" id="guia_id" class="texto01"  value="<?= @$obj->_guia_id; ?>"/>
                                <tr>
                                    <td>Paciente: <?= @$obj->_nome ?></td>
                                    <td >Exame: <?= @$obj->_procedimento ?></td>
                                    <td>Solicitante: <?= @$obj->_solicitante ?></td>
                                    <td rowspan="3">
                                        <? if (file_exists("./upload/webcam/pacientes/" . @$obj->_paciente_id . ".jpg")) { ?>
                                            <img class=" img-rounded" src="<?= base_url() ?>upload/webcam/pacientes/<?= @$obj->_paciente_id ?>.jpg" width="100" height="120" />  
                                        <? } else { ?>
                                            <!--<img src="<?= base_url() ?>upload/webcam/pacientes/<?= @$obj->_paciente_id ?>.jpg" width="100" height="120" />-->
                                        <? }
                                        ?> 

                                    </td>
                                </tr>
                                <tr><td>Idade: <?= $teste ?></td>
                                    <td>Nascimento:<?= substr(@$obj->_nascimento, 8, 2) . "/" . substr(@$obj->_nascimento, 5, 2) . "/" . substr(@$obj->_nascimento, 0, 4); ?></td>
                                    <td>Sala:<?= @$obj->_sala ?></td>
                                </tr>
                                <tr><td>Sexo: <?= @$obj->_sexo ?></td>
                                    <td>Convenio:<?= @$obj->_convenio; ?></td>
                                    <td>Telefone: <?= @$obj->_telefone ?></td>
                                </tr>
    <!--                            <tr>
                                    <td>Sexo: <?= @$obj->_sexo ?></td>
                                    <td>Convenio:<?= @$obj->_convenio; ?></td>
                                    <td>Telefone: <?= @$obj->_telefone ?></td>
    
                                </tr>-->



                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel panel-default">

            <div class="alert alert-info">
                Atestado
            </div>
            <div class="panel-body">


                <br>
                <div class="row">
                    <div class="col-lg-3">

                        <a class="btn btn-outline btn-warning" href="<?php echo base_url() ?>ambulatorio/modeloatestado/carregarmodeloatestado/0" target="_blank">
                            Novo Modelo Atestado
                        </a>

                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>CID Primario</label>
                            <input type="hidden" name="agrupadorfisioterapia" id="agrupadorfisioterapia" value="<?= @$obj->_agrupador_fisioterapia; ?>" class="size2" />
                            <input type="hidden" name="cid1ID" id="txtCICPrimario" value="<?= @$obj->_cid; ?>" class="size2" />
                            <input type="text" name="txtcid1" id="txtCICPrimariolabel" value="<?= @$obj->_ciddescricao; ?>" class="form-control texto08 eac-square" />

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>CID Secundario</label>
                            <input type="hidden" name="cid2ID" id="txtCICSecundario" value="<?= @$obj->_cid2; ?>" class="form-control" />
                            <input type="text" name="txtcid2" id="txtCICSecundariolabel" value="<?= @$obj->_cid2descricao; ?>" style="max-width: 400px;" class="form-control eac-square" />

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Modelos</label>

                            <select name="exame" id="exame" class="form-control" >
                                <option value='' ></option>
                                <option value=''  selected="">Selecione</option>
                                <?php foreach ($lista as $item) { ?>
                                    <option value="<?php echo $item->ambulatorio_modelo_atestado_id; ?>" ><?php echo $item->nome; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Data</label>
                            <input type="text" id="data" name="data" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label for="carimbo">Carimbo</label>
                            <input class="checkbox" type="checkbox" id="carimbo"  name="carimbo" id="carimbo"/>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label for="assinatura">Assinatura</label>
                            <input class="checkbox" type="checkbox" id="assinatura" name="assinatura" id="assinatura"/>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="imprimircid">Imprimir CID</label>
                            <input class="checkbox" type="checkbox"  name="imprimircid" id="imprimircid" />
                        </div>
                    </div>







                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <textarea id="laudo" name="laudo" rows="20" cols="80" style="width: 80%"><?= $texto ?></textarea>
                        <input type="hidden" id="receituario_id" name="receituario_id" value="<?= $receituario_id ?>"/>
                        <input type="hidden" id="ambulatorio_laudo_id" name="ambulatorio_laudo_id" value="<?= $ambulatorio_laudo_id ?>"/>
                        <input type="hidden" id="medico" name="medico" value="<?= $operador_id ?>"/>

                    </div>
                </div>   
                <br>

                <div class="row">
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Salvar</button>
                    </div>
                    <div class="col-lg-1">
                        <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                    </div>
                </div>


            </div>

        </div>
    </form>
</div> 
<div >


    <div >


        <?
        if (count($receita) > 0) {
            ?>
            <table id="table_agente_toxico" border="0">
                <thead>
                    <tr>
                        <th class="tabela_header">Data</th>
                        <th class="tabela_header">Descri&ccedil;&atilde;o</th>
                        <th colspan="2" class="tabela_header">&nbsp;</th>
                    </tr>
                </thead>
                <?
                $estilo_linha = "tabela_content01";
                foreach ($receita as $item) {
                    ($estilo_linha == "tabela_content01") ? $estilo_linha = "tabela_content02" : $estilo_linha = "tabela_content01";
                    ?>
                    <tbody>
                        <tr>
                            <td class="<?php echo $estilo_linha; ?>"><?= date("d/m/Y", strtotime($item->data_cadastro)); ?></td>
                            <td class="<?php echo $estilo_linha; ?>"><?= $item->texto; ?></td>
                            <td class="<?php echo $estilo_linha; ?>" width="60px;"><div class="bt_link">
                                    <a onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/impressaoatestado/<?= $item->ambulatorio_atestado_id; ?>');">Imprimir
                                    </a></div>
                            </td>
                            <td class="<?php echo $estilo_linha; ?>" width="60px;"><div class="bt_link">
                                    <a onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/editarcarregaratestado/<?= $ambulatorio_laudo_id ?>/<?= $item->ambulatorio_atestado_id; ?>');">Editar
                                    </a></div>
                            </td>

                        </tr>

                    </tbody>
                    <?
                }
            }
            ?>

        </table> 

        </fieldset>

    </div> 
</div> <!-- Final da DIV content -->
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 1300px; }
    #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
</style>
<script src="<?= base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>bootstrap/vendor/clock/compiled/flipclock.js"></script>
<script src="<?= base_url() ?>bootstrap/vendor/font-awesome/css/fonts.js"></script>

<script  src="<?= base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendor/autocomplete/jquery.easy-autocomplete.js" ></script>

<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskMoney.js"></script>

<!--        SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

<script src="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.min.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript">

                                        $(function () {
                                            $("#data").datepicker({
                                                autosize: true,
                                                changeYear: true,
                                                changeMonth: true,
                                                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                                dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                                                buttonImage: '<?= base_url() ?>img/form/date.png',
                                                dateFormat: 'dd/mm/yy'
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

                                        var cid1 = {
                                            url: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
                                            getValue: "value",
                                            list: {
                                                onSelectItemEvent: function () {
                                                    var value = $("#txtCICPrimariolabel").getSelectedItemData().id;

                                                    $("#txtCICPrimario").val(value).trigger("change");
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
                                                maxNumberOfElements: 20
                                            },
                                            theme: "bootstrap"
                                        };

                                        $("#txtCICPrimariolabel").easyAutocomplete(cid1);
                                        // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL
                                        // NOVOS AUTOCOMPLETES.
                                        // A primeira coisa a definir é o nome da variável pra jogar no Jquery mais tarde
                                        // Url é a função que vai trazer o JSON.
                                        // getValue é onde se define o nome do campo que você quer que apareça na lista
                                        // Exemplo do getValue. Na função abaixo do CBOprofissionais, o Hamilton definiu value como o valor do CBO dos profissionais
                                        // Daí dentro da função list você define que match está enable, pra que ele possa verificar pelo texto que o cara digita
                                        // OnSelectItem event é a função responsável por jogar o ID que você quer no campo Hidden
                                        // getSelectedItemData(). Depois do ponto você coloca o campo que vai ser jogado no Hidden
                                        // Daí embaixo tem o Jquery padrão pra jogar o ID no campo Hidden

                                        var cid2 = {
                                            url: "<?= base_url() ?>index.php?c=autocomplete&m=cid1",
                                            getValue: "value",
                                            list: {
                                                onSelectItemEvent: function () {
                                                    var value = $("#txtCICSecundariolabel").getSelectedItemData().id;

                                                    $("#txtCICSecundario").val(value).trigger("change");
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
                                                maxNumberOfElements: 20
                                            },
                                            theme: "bootstrap"
                                        };

                                        $("#txtCICSecundariolabel").easyAutocomplete(cid2);
                                        // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL


                                        $(document).ready(function () {
                                            $('#sortable').sortable();
                                        });



                                        tinyMCE.init({
                                            // General options
                                            mode: "textareas",
                                            theme: "advanced",
                                            plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
                                            // Theme options
                                            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,pagebreak,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                            theme_advanced_toolbar_location: "top",
                                            theme_advanced_toolbar_align: "left",
                                            theme_advanced_statusbar_location: "bottom",
                                            theme_advanced_resizing: true,
                                            // Example content CSS (should be your site CSS)
                                            //                                    content_css : "css/content.css",
                                            content_css: "js/tinymce/jscripts/tiny_mce/themes/advanced/skins/default/img/content.css",
                                            // Drop lists for link/image/media/template dialogs
                                            template_external_list_url: "lists/template_list.js",
                                            external_link_list_url: "lists/link_list.js",
                                            external_image_list_url: "lists/image_list.js",
                                            media_external_list_url: "lists/media_list.js",
                                            // Style formats
                                            style_formats: [
                                                {title: 'Bold text', inline: 'b'},
                                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                                {title: 'Table styles'},
                                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                                            ],
                                            // Replace values for the template plugin
                                            template_replace_values: {
                                                username: "Some User",
                                                staffid: "991234"
                                            }

                                        });

                                        $(function () {
                                            $('#exame').change(function () {
                                                if ($(this).val()) {
                                                    //$('#laudo').hide();
                                                    $('.carregando').show();
                                                    $.getJSON('<?= base_url() ?>autocomplete/modelosatestado', {exame: $(this).val(), ajax: true}, function (j) {
                                                        options = "";

                                                        options += j[0].texto;
                                                        //                                                document.getElementById("laudo").value = options

                                                        $('#laudo').val(options)
                                                        var ed = tinyMCE.get('laudo');
                                                        ed.setContent($('#laudo').val());

                                                        //$('#laudo').val(options);
                                                        //$('#laudo').html(options).show();
                                                        //                                                $('.carregando').hide();
                                                        //history.go(0) 
                                                    });
                                                } else {
                                                    $('#laudo').html('value=""');
                                                }
                                            });
                                        });









</script>

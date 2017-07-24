<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="STG SAUDE">
    <title>Cadastro Modelo Laudo</title>
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
    <link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/prism.css">
    <link rel="stylesheet" href="<?= base_url() ?>js/chosen/docsupport/bootstrap-chosen.css">
</head>
<div class="container-fluid"> <!-- Inicio da DIV content -->

    <!--<br>-->
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Cadastro Modelo Laudo
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary btn-outline btn-sm" href="<?= base_url() ?>ambulatorio/modelolaudo/pesquisar">
                Voltar
            </a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info">
                    Modelo
                </div>
            </div>
        </div>
        <div class="panel-body" >
            <div>
                <h3 class="singular"></h3>
                <div>
                    <form name="form_modelolaudo" id="form_modelolaudo" action="<?= base_url() ?>ambulatorio/modelolaudo/gravar" method="post">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <textarea id="laudo" style="width: 600px;height: 500px;" name="laudo"><?= @$obj->_texto; ?></textarea>
                                </div>
                            </div>

                        </div>
                        <!--                        <div>
                                                    <textarea id="laudo" name="laudo" rows="15" cols="80" style="width: 80%"><?= @$obj->_texto; ?></textarea>
                                                </div>-->

                        <!--                <div>
                                            <textarea id="laudo" name="laudo" class="jqte-test" ><?= @$obj->_texto; ?></textarea>
                                        </div>-->
                        <div class="row">

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="hidden" name="ambulatorio_modelo_laudo_id" class="form-control" value="<?= @$obj->_ambulatorio_modelo_laudo_id; ?>" />
                                    <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?= @$obj->_nome; ?>" />

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Medicos</label>
                                    <select name="medico" id="medico" class="form-control">
                                        <? foreach ($medicos as $value) : ?>
                                            <option value="<?= $value->operador_id; ?>"<?
                                            if (@$obj->_medico_id == $value->operador_id):echo'selected';
                                            endif;
                                            ?>><?php echo $value->nome; ?></option>
                                                <? endforeach; ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div >
                                    <label>Procedimento</label>
                                    <select name="procedimento" id="procedimento" class="chosen-select" tabindex="1">
                                        <? foreach ($procedimentos as $value) : ?>
                                            <option value="<?= $value->procedimento_tuss_id; ?>"<?
                                            if (@$obj->_procedimento_tuss_id == $value->procedimento_tuss_id):echo'selected';
                                            endif;
                                            ?>><?php echo $value->nome; ?></option>
                                                <? endforeach; ?>
                                    </select>
                                </div>


                            </div>
                        </div>


                       <br>
                       <br>
                        <div class="row">

                            <div class="col-lg-4">
                                <p>
                                    <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Enviar</button>
                                    <!--</div>-->
                                    <!--<div class="col-lg-1">-->
                                    <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                                </p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> <!-- Final da DIV content -->
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
<script type="text/javascript" src="<?= base_url() ?>js/chosen/chosen.jquery.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/chosen/docsupport/prism.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/chosen/docsupport/init.js"></script>

<script type="text/javascript">

    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,

        // Example content CSS (should be your site CSS)
        content_css: "css/content.css",

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






    $('#btnVoltar').click(function () {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function () {
        $("#accordion").accordion();
    });

    $(document).ready(function () {
        jQuery('#form_modelolaudo').validate({
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

</script>
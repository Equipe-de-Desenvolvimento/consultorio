<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="STG SAUDE">
    <title>Receituário</title>
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
<form name="form_laudo" id="form_laudo" action="<?= base_url() ?>ambulatorio/laudo/gravarreceituario/<?= $ambulatorio_laudo_id ?>" method="post">
    <div class="container-fluid">

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
            $receituario_id = $receita[0]->ambulatorio_receituario_id;
            $medico = $receita[0]->medico_parecer1;
        }
        $operador_id = $this->session->userdata('operador_id');
        ?>


        <div class="row">
            <div class="col-lg-12"> 
                <div class="alert alert-success ">
                    Receituário
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
                                            <img class=" img-rounded" src="<?= base_url() ?>upload/webcam/pacientes/<?=@$obj->_paciente_id?>.jpg" width="100" height="120" />  
                                        <? } else { ?>
                                            <!--<img src="<?= base_url() ?>upload/webcam/pacientes/<?=@$obj->_paciente_id?>.jpg" width="100" height="120" />-->
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
                Receituário
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <a class="btn btn-outline btn-warning" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/modeloreceita');" style="width: 250px; margin: 5px">
                            Modelo Receituario</a>

                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-outline btn-warning" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/modelomedicamento');" style="width: 250px; margin: 5px">
                            Modelo Medicamento</a>

                    </div>
                </div>     
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Modelos</label>
                            <select name="exame" id="exame" class="form-control" >
                                <option value='' >Selecione</option>
                                <?php foreach ($lista as $item) { ?>
                                    <option value="<?php echo $item->ambulatorio_modelo_receita_id; ?>" ><?php echo $item->nome; ?></option>
                                <?php } ?>
                            </select>

                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Medicamento</label>
                            <input type="text" id="medicamento" class="form-control eac-square" name="medicamento"/>

                        </div>

                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label>Carimbo</label>
                            <input class="checkbox" type="checkbox" id="carimbo"  name="carimbo"/>

                        </div>

                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Assinatura</label>
                            <input class="checkbox" type="checkbox" id="assinatura" name="assinatura"/>

                        </div>

                    </div>




                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">

                        <textarea id="laudo" name="laudo" rows="25" cols="80" style="width: 80%"></textarea>
                        <input type="hidden" id="receituario_id" name="receituario_id" value="<?= $receituario_id ?>"/>
                        <input type="hidden" id="ambulatorio_laudo_id" name="ambulatorio_laudo_id" value="<?= $ambulatorio_laudo_id ?>"/>
                        <input type="hidden" id="medico" name="medico" value="<?= $operador_id ?>"/>

                    </div>
                </div>   
                <br>
                <div class="row">
                    <div class="col-lg-1">
                        <div>
                            <label id="titulosenha">Senha</label>
                            <input type="password" name="senha" id="senha" class="size1" />
                        </div>
                    </div>
                </div>
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
        <?
if (count($receita) > 0) {
    ?>
    <div class="panel panel-default">
        <div class="alert alert-info">
            Receituários
        </div>
        <div class="row">
            <div class="col-lg-8">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" border="0">
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
                                                <a class="btn btn-outline btn-warning" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/impressaoreceita/<?= $item->ambulatorio_receituario_id; ?>');"><i class="fa fa-print" aria-hidden="true"></i>
Imprimir
                                                </a></div>
                                        </td>
                                        <td class="<?php echo $estilo_linha; ?>" width="60px;"><div class="bt_link">
                                                <a class="btn btn-outline btn-warning" onclick="javascript:window.open('<?= base_url() ?>ambulatorio/laudo/editarcarregarreceituario/<?= $ambulatorio_laudo_id ?>/<?= $item->ambulatorio_receituario_id; ?>');">Editar
                                                </a></div>
                                        </td>

                                    </tr>

                                </tbody>
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

    </div>

</form>








<!-- Final da DIV content -->
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

      document.getElementById('titulosenha').style.display = "none";
      document.getElementById('senha').style.display = "none";


      $(document).ready(function () {
          $('#sortable').sortable();
      });


      $(document).ready(function () {
          jQuery('#ficha_laudo').validate({
              rules: {
                  imagem: {
                      required: true
                  }
              },
              messages: {
                  imagem: {
                      required: "*"
                  }
              }
          });
      });



      function muda(obj) {
          if (obj.value != 'DIGITANDO') {
              document.getElementById('titulosenha').style.display = "block";
              document.getElementById('senha').style.display = "block";
          } else {
              document.getElementById('titulosenha').style.display = "none";
              document.getElementById('senha').style.display = "none";
          }
      }



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
                  $.getJSON('<?= base_url() ?>autocomplete/modelosreceita', {exame: $(this).val(), ajax: true}, function (j) {
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

      $(function () {
          $('#linha').change(function () {
              if ($(this).val()) {
                  //$('#laudo').hide();
                  $('.carregando').show();
                  $.getJSON('<?= base_url() ?>autocomplete/modeloslinhas', {linha: $(this).val(), ajax: true}, function (j) {
                      options = "";

                      options += j[0].texto;
                      //                                                document.getElementById("laudo").value = $('#laudo').val() + options
                      $('#laudo').val() + options
                      var ed = tinyMCE.get('laudo');
                      ed.setContent($('#laudo').val());
                      //$('#laudo').html(options).show();
                  });
              } else {
                  $('#laudo').html('value=""');
              }
          });
      });

//      $(function () {
//          $("#medicamento").autocomplete({
//              source: "<?= base_url() ?>index.php?c=autocomplete&m=medicamentolaudo",
//              minLength: 1,
//              focus: function (event, ui) {
//                  $("#medicamento").val(ui.item.label);
//                  return false;
//              },
//              select: function (event, ui) {
//                  $("#medicamento").val(ui.item.value);
//                  tinyMCE.triggerSave(true, true);
//                  document.getElementById("laudo").value = $('#laudo').val() + ui.item.id
//                  $('#laudo').val() + ui.item.id
//                  var ed = tinyMCE.get('laudo');
//                  ed.setContent($('#laudo').val());
//                  //$( "#laudo" ).val() + ui.item.id;
//                  document.getElementById("medicamento").value = ''
//                  return false;
//              }
//          });
//      });
      
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

                       var medicamento = {
                           url: "<?= base_url() ?>index.php?c=autocomplete&m=medicamentolaudo",
                           getValue: "value",
                           list: {
                               onClickEvent: function () {
                                   var value = $("#medicamento").getSelectedItemData().id;

//                                   $("#txtCICSecundario").val(value).trigger("change");
                                   
                                   
                                   tinyMCE.triggerSave(true, true);
                                   document.getElementById("laudo").value = $('#laudo').val() + value;
                                   $('#laudo').val() + value;
                                   var ed = tinyMCE.get('laudo');
                                   ed.setContent($('#laudo').val());
                                   //$( "#laudo" ).val() + ui.item.id;
                                   document.getElementById("medicamento").value = '';
                               },
                               onKeyEnterEvent: function () {
                                   var value = $("#medicamento").getSelectedItemData().id;

//                                   $("#txtCICSecundario").val(value).trigger("change");
                                   
                                   
                                   tinyMCE.triggerSave(true, true);
                                   document.getElementById("laudo").value = $('#laudo').val() + value;
                                   $('#laudo').val() + value;
                                   var ed = tinyMCE.get('laudo');
                                   ed.setContent($('#laudo').val());
                                   //$( "#laudo" ).val() + ui.item.id;
                                   document.getElementById("medicamento").value = '';
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

                       $("#medicamento").easyAutocomplete(medicamento);
                       // FINAL DO AUTOCOMPLETE NOVO. DEFINE AQUI O ID DO CAMPO ATRIBUIDO E A VARIVEL

      $(function () {
          $("#linha2").autocomplete({
              source: "<?= base_url() ?>index.php?c=autocomplete&m=linhas",
              minLength: 1,
              focus: function (event, ui) {
                  $("#linha2").val(ui.item.label);
                  return false;
              },
              select: function (event, ui) {
                  $("#linha2").val(ui.item.value);
                  tinyMCE.triggerSave(true, true);
                  document.getElementById("laudo").value = $('#laudo').val() + ui.item.id
                  $('#laudo').val() + ui.item.id
                  var ed = tinyMCE.get('laudo');
                  ed.setContent($('#laudo').val());
                  //$( "#laudo" ).val() + ui.item.id;
                  document.getElementById("linha2").value = ''
                  return false;
              }
          });
      });

      $(function (a) {
          $('#anteriores').change(function () {
              if ($(this).val()) {
                  //$('#laudo').hide();
                  $('.carregando').show();
                  $.getJSON('<?= base_url() ?>autocomplete/laudosanteriores', {anteriores: $(this).val(), ajax: true}, function (i) {
                      option = "";

                      option = i[0].texto;
                      tinyMCE.triggerSave();
                      document.getElementById("laudo").value = option
                      //$('#laudo').val(options);
                      //$('#laudo').html(options).show();
                      $('.carregando').hide();
                      history.go(0)
                  });
              } else {
                  $('#laudo').html('value="texto"');
              }
          });
      });
      //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      $('.jqte-test').jqte();








</script>

<body bgcolor="#C0C0C0">
<meta charset="UTF-8">

    <div class="container-fluid"> <!-- Inicio da DIV content -->


    <div class="panel panel-default">
        <div class="alert alert-info">
             <h3>Observação</h3>
              <!--CSS PADRAO DO BOOTSTRAP COM ALGUMAS ALTERAÇÕES DO TEMA-->
    <link href="<?= base_url() ?>bootstrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.css" rel="stylesheet" />
    <link href="<?= base_url() ?>bootstrap/dist/css/sb-admin-2.css" rel="stylesheet" />
        </div> 
        <div class="panel-body">
       
        <div>
            <form name="form_horariostipo" id="form_horariostipo" action="<?= base_url() ?>ambulatorio/exame/observacaogravar/<?= $agenda_exame_id; ?>" method="post">
                <fieldset>
                    
                <dl class="dl_desconto_lista">
                    <dt>
                    <label>Observação</label>
                    </dt>
                        <textarea type="text" name="txtobservacao" cols="55" class="texto12"><?= $observacao[0]->observacoes; ?></textarea>

                     
                </dl>    

                <hr/>
               <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>
                    </div>
            </form>
            </fieldset>
        </div>
</div> <!-- Final da DIV content -->
</body>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $('#btnVoltar').click(function() {
        $(location).attr('href', '<?= base_url(); ?>ponto/cargo');
    });

    $(function() {
        $( "#accordion" ).accordion();
    });

    $(document).ready(function(){
        jQuery('#form_horariostipo').validate( {
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
<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Carregar Imagem Individual
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <form enctype="multipart/form-data" action="<?=base_url() . 'ambulatorio/guia/importarimagem'?>" method="POST">
         <?//= form_open_multipart(base_url() . 'ambulatorio/guia/importarimagem'); ?>
            <div class="form-group">
                
            
           
            <label>Informe o arquivo para importa&ccedil;&atilde;o</label><br>
            <input type="file"  name="userfile"/>
            </div>
            
            <input type="hidden" name="guia_id" value="<?= $guia_id; ?>" />
            <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>
            <?//= form_close(); ?>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">

            
            
        </div>
    </div>
    
    <br>
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Visualizar Imagens
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <?
                $i = 0;
//                var_dump($arquivo_pasta); die;
                if ($arquivo_pasta != false):
                    foreach ($arquivo_pasta as $value) :
                        $i++;
                        ?>

                <td width="10px"><img  width="50px" height="50px" onclick="javascript:window.open('<?= base_url() . "upload/guia/" . $guia_id . "/" . $value ?>', '_blank', 'toolbar=no,Location=no,menubar=no,width=1200,height=600');" src="<?= base_url() . "upload/guia/" . $guia_id . "/" . $value ?>"><br><? echo substr($value, 0, 10) ?><br><a class="btn btn-outline btn-danger btn-xs" href="<?= base_url() ?>ambulatorio/guia/excluirimagem/<?= $guia_id ?>/<?= $value ?>">Excluir</a></td>
                        <?
                        if ($i == 8) {
                            ?>
                        </tr><tr>
                            <?
                        }
                    endforeach;
                endif
                ?>
        </table>
    </div> <!-- Final da DIV content -->

    <!-- Final da DIV content -->
</div> <!-- Final da DIV content -->
<script type="text/javascript">

    $(function () {
        $("#accordion").accordion();
    });



</script>

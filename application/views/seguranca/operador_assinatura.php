<div id="page-wrapper"> <!-- Inicio da DIV content -->
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Carregar Assinatura
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <!--<form enctype="multipart/form-data" action="<?= base_url() . 'seguranca/operador/importarimagem' ?>" method="POST">-->
                <?= form_open_multipart(base_url() . 'seguranca/operador/importarimagem'); ?>
                <div class="form-group">
                    <label>Informe o arquivo para importa&ccedil;&atilde;o</label><br>
                    <input type="file" name="userfile"/>
                    <!--<button type="submit" name="btnEnviar">Enviar</button>-->
                    <input type="hidden" name="operador_id" value="<?= $operador_id; ?>" />
                </div>

                <!--<input type="hidden" name="guia_id" value="<?= $guia_id; ?>" />-->
                <button type="submit" class="btn btn-outline btn-success btn-sm" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button>
                <?= form_close(); ?>
            <!--</form>-->
        </div>
    </div>
<!--    <div class="row">
        <div class="col-lg-4">



        </div>
    </div>-->

    <br>
    <div class="row">
        <div class="col-lg-12"> 
            <div class="alert alert-success ">
                Visualizar Imagens
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="tabel">
            <tr>
                <?
//                file_exists($filename)
//              var_dump(base_url() . "upload/1ASSINATURAS/$operador_id.jpg");
//                var_dump($arquivo_pasta);
//                die;
                $i = 0;
                if (file_exists("./upload/1ASSINATURAS/$operador_id.jpg")):
                    ?>
                    <td width="10px"><img  width="50px" height="50px" onclick="javascript:window.open('<?= base_url() . "upload/1ASSINATURAS/$operador_id.jpg" ?>', '_blank', 'toolbar=no,Location=no,menubar=no,width=1200,height=600');" src="<?= base_url() . "upload/1ASSINATURAS/$operador_id.jpg" ?>"><br><? echo "$operador_id.jpg" ?>
                        <br/><a class="btn btn-outline btn-danger btn-xs" onclick="confirmacaoexcluir(<?=$operador_id?>);">Excluir</a></td>
                    <?
                endif
                ?>
        </table>
    </div> <!-- Final da DIV content -->

    <!-- Final da DIV content -->
</div>
<!--<div id="page-wrapper">  Inicio da DIV content 
    <div id="accordion">
        <h3><a href="#"> </a></h3>
        <div >
            

            <?= form_close(); ?>

        </div>

        <h3><a href="#">Vizualizar imagens </a></h3>
        <div >

        </div>  Final da DIV content 
    </div>  Final da DIV content 
</div>  Final da DIV content -->
<script type="text/javascript">

    function confirmacaoexcluir(idexcluir) {
        swal({
            title: "Tem certeza?",
            text: "Você está prestes a deletar um arquivo! Não será possível recuperá-lo depois",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#337ab7",
            confirmButtonText: "Sim, quero deletar!",
            cancelButtonText: "Não, cancele!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.open('<?= base_url() ?>seguranca/operador/ecluirimagem/' + idexcluir, '_self');
                    } else {
                        swal("Cancelado", "Você desistiu de deletar um arquivo", "error");
                    }
                });

    }



</script>

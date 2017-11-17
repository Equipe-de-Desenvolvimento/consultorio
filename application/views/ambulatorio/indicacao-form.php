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
    <form name="form_procedimentoplano" id="form_procedimentoplano" action="<?= base_url() ?>ambulatorio/indicacao/gravar" method="post">
        <div class="panel panel-default ">
            <div class="alert alert-info">
                Dados do Procedimento
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="hidden" name="paciente_indicacao_id" class="texto10" value="<?= @$obj->_paciente_indicacao_id; ?>" />
                            <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?= @$obj->_nome; ?>" />
                        </div>


                    </div>
                </div>
                <br>
                <div class="row">

                    <div class="col-lg-5">
                        <p>
                            <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Enviar</button>
                            <!--</div>-->
                            <!--<div class="col-lg-1">-->
                            <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </form>

</div> 



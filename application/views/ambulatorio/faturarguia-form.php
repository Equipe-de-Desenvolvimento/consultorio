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
<!--CSS DO Calendário-->
<link href="<?= base_url() ?>bootstrap/fullcalendar/fullcalendar.css" rel="stylesheet" />



<!--SCRIPTS -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js" type="text/javascript"></script>-->
<script src="<?= base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>bootstrap/vendor/font-awesome/css/fonts.js"></script>

<script  src="<?= base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.min.js"></script>
<script  src="<?= base_url() ?>bootstrap/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendor/autocomplete/jquery.easy-autocomplete.js" ></script>

<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.maskMoney.js"></script>

<!--        SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

<script src="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.min.js"></script> 

<!--Scripts necessários para o calendário-->
<script type="text/javascript" src="<?= base_url() ?>bootstrap/fullcalendar/lib/moment.min.js"></script>
<script src="<?= base_url() ?>bootstrap/fullcalendar/locale/pt-br.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>bootstrap/fullcalendar/fullcalendar.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>bootstrap/fullcalendar/scheduler.js" type="text/javascript" charset="utf-8"></script>
<meta charset="utf-8">
<body style="overflow-y: auto;">
    <form name="form_faturar" id="form_faturar" action="<?= base_url() ?>ambulatorio/guia/gravarfaturadoguia" method="post">
        <div class="container-fluid"> <!-- Inicio da DIV content -->

            <div class="row">
                <div class="col-lg-12"> 
                    <div class="alert alert-success ">
                        Faturar Guia
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            Faturar
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor total a faturar</label>
                                        <input type="text" name="valorafaturar" id="valorafaturar" class="form-control dinheiro" value="<?= $exame[0]->total; ?>" readonly />
                                        <input type="hidden" name="guia_id" id="guia_id" class="texto01" value="<?= $guia_id; ?>"/>
                                        <input type="hidden" name="financeiro_grupo_id" id="financeiro_grupo_id" class="texto01" value="<?= $financeiro_grupo_id; ?>"/>
                                    </div> 

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Desconto</label>
                                        <input type="text" name="desconto" id="desconto" size="7" value="<?= $valor; ?>" class="form-control"/>
                                        <input type="hidden" name="dinheiro" id="dinheiro" value="0"class="texto01"/>
                                        <input type="hidden" name="juroscartao" id="juroscartao" value="0"class="texto01"/>
                                    </div> 

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor1</label>
                                        <input type="text" name="valor1" id="valor1" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                        <input type="hidden" name="valorMinimo1" id="valorMinimo1"/>
                                    </div> 

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Forma de pagamento1</label>
                                        <select  name="formapamento1" id="formapamento1" class="form-control" >
                                            <option value="">Selecione</option>
                                            <? foreach ($forma_pagamento as $item) : ?>
                                                <option value="<?= $item->forma_pagamento_id; ?>" onclick="mudaValor('1', '<?= $item->parcela_minima; ?>')">
                                                    <?= $item->nome; ?>
                                                </option>
                                            <? endforeach; ?>
                                        </select>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Ajuste1(%)</label>
                                        <input type="text" name="ajuste1" id="ajuste1" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor Ajustado</label>
                                        <input type="text" name="valorajuste1" id="valorajuste1" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Parcelas</label>
                                        <input style="width: 60px;" type="number" name="parcela1" id="parcela1" value="1" class="form-control" min="1" />
                                    </div> 

                                </div>

                            <!--<input type="hidden" name="totalpagar" id="totalpagar"  class="texto01" onblur="history.go(0)"/>-->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor2</label>
                                        <input type="text" name="valor2" id="valor2" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                        <input type="hidden" name="valorMinimo2" id="valorMinimo2"/>
                                    </div> 

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Forma de pagamento2</label>
                                        <select  name="formapamento2" id="formapamento2" class="form-control">
                                            <option value="">Selecione</option>
                                            <? foreach ($forma_pagamento as $item) : ?>
                                                <option value="<?= $item->forma_pagamento_id; ?>"  onclick="mudaValor('2', '<?= $item->parcela_minima; ?>')">
                                                    <?= $item->nome; ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Ajuste2(%)</label>
                                        <input type="text" name="ajuste2" id="ajuste2" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor Ajustado</label>
                                        <input type="text" name="valorajuste2" id="valorajuste2" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Parcelas</label>
                                        <input style="width: 60px;" type="number" name="parcela2" id="parcela2" class="form-control" value="1" min="1" />
                                    </div> 

                                </div>

                            <!--<input type="hidden" name="totalpagar" id="totalpagar"  class="texto01" onblur="history.go(0)"/>-->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor3</label>
                                        <input type="text" name="valor3" id="valor3" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                        <input type="hidden" name="valorMinimo3" id="valorMinimo3"/>
                                    </div> 

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Forma de pagamento3</label>
                                        <select  name="formapamento3" id="formapamento3" class="form-control">
                                            <option value="">Selecione</option>
                                            <? foreach ($forma_pagamento as $item) : ?>
                                                <option value="<?= $item->forma_pagamento_id; ?>"  onclick="mudaValor('2', '<?= $item->parcela_minima; ?>')">
                                                    <?= $item->nome; ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Ajuste3(%)</label>
                                        <input type="text" name="ajuste3" id="ajuste3" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor Ajustado</label>
                                        <input type="text" name="valorajuste3" id="valorajuste3" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Parcelas</label>
                                        <input style="width: 60px;" type="number" name="parcela3" class="form-control" id="parcela3" size="2" value="1" min="1" />
                                    </div> 

                                </div>

                            <!--<input type="hidden" name="totalpagar" id="totalpagar"  class="texto01" onblur="history.go(0)"/>-->
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor4</label>
                                        <input type="text" name="valor4" id="valor4" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                        <input type="hidden" name="valorMinimo4" id="valorMinimo4"/>
                                    </div> 

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Forma de pagamento4</label>
                                        <select  name="formapamento4" id="formapamento4" class="form-control">
                                            <option value="">Selecione</option>
                                            <? foreach ($forma_pagamento as $item) : ?>
                                                <option value="<?= $item->forma_pagamento_id; ?>"  onclick="mudaValor('2', '<?= $item->parcela_minima; ?>')">
                                                    <?= $item->nome; ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Ajuste4(%)</label>
                                        <input type="text" name="ajuste4" id="ajuste4" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor Ajustado</label>
                                        <input type="text" name="valorajuste4" id="valorajuste4" class="form-control" value="<?= $valor; ?>" onblur="history.go(0)"/>
                                    </div> 

                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Parcelas</label>
                                        <input style="width: 60px;" type="number" name="parcela4" id="parcela4" class="form-control" value="1" min="1" />
                                    </div> 

                                </div>

                            <!--<input type="hidden" name="totalpagar" id="totalpagar"  class="texto01" onblur="history.go(0)"/>-->
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Diferença</label>
                                    <input type="text" name="valortotal" id="valortotal"  onkeyup="multiplica()"  class="form-control" readonly/>
                                    <input type="hidden" name="valorcadastrado" id="valorcadastrado" value="<?= $exame[0]->total; ?>"/>
                                    <input type="hidden" name="juros" id="juros" value="0">  
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <p>
                                    <button class="btn btn-outline btn-success btn-sm" type="submit" name="btnEnviar"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Salvar</button>
                                
                                    <button class="btn btn-outline btn-danger btn-sm" type="reset" name="btnLimpar">Limpar</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- Final da DIV content -->
    </form>
</body>
<!--<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.8.5.custom.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-meiomask.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/jquery-1.9.1.js" ></script>-->
<script type="text/javascript" src="<?= base_url() ?>js/jquery-ui-1.10.4.js" ></script>
<script type="text/javascript">
                                        function mudaValor(id, valor) {
                                            $("#valorMinimo" + id).val(valor);
                                        }

                                        $(document).ready(function () {

                                            function multiplica()
                                            {
                                                total = 0;
                                                valor = parseFloat(document.form_faturar.valorcadastrado.value.replace(",", "."));
                                                dinheiro = parseFloat(document.form_faturar.dinheiro.value.replace(",", "."));
                                                juroscartao = document.form_faturar.juroscartao.value;
                                                valordesconto = parseFloat(document.form_faturar.desconto.value.replace(",", "."));
                                                desconto = (100 - valordesconto) / 100;
                                                calculo = valor - dinheiro;
                                                totalpagarcartao = (calculo * 1.05);
                                                totalpagar = totalpagarcartao + dinheiro;
                                                juros = totalpagarcartao - calculo;
                                                numer1 = parseFloat(document.form_faturar.valor1.value.replace(",", "."));
                                                numer2 = parseFloat(document.form_faturar.valor2.value.replace(",", "."));
                                                numer3 = parseFloat(document.form_faturar.valor3.value.replace(",", "."));
                                                numer4 = parseFloat(document.form_faturar.valor4.value.replace(",", "."));
                                                total += numer1 + numer2 + numer3 + numer4;
                                                $('#totalpagar').val(totalpagarcartao);

                                                valordescontado = valor * desconto;
                                                //resultado = total - valordescontado;
                                                resultado = valor - (total + valordesconto);

                                                y = resultado.toFixed(2);
                                                resultado2 = total - totalpagar;
                                                y2 = resultado2.toFixed(2);

                                                if (juroscartao !== "1") {

                                                    $('#valortotal').val(y);
                                                    $('#novovalortotal').val(valordescontado);
                                                } else {
                                                    $('#valortotal').val(y2);
                                                    $('#novovalortotal').val(totalpagar);
                                                    $('#juros').val(juros);
                                                }

//            document.getElementById("valortotal").value = 10;
                                                //        document.form_faturar.valortotal.value = 10;
                                            }
                                            multiplica();
                                            $(function () {
                                                $('#formapamento1').change(function () {
                                                    if ($(this).val()) {
                                                        forma_pagamento_id = document.getElementById("formapamento1").value;
                                                        $('.carregando').show();
                                                        $.getJSON('<?= base_url() ?>autocomplete/formapagamento/' + forma_pagamento_id + '/', {formapamento1: $(this).val(), ajax: true}, function (j) {
                                                            options = "";
                                                            parcelas = "";
                                                            options = j[0].ajuste;
                                                            parcelas = j[0].parcelas;
                                                            numer_1 = parseFloat(document.form_faturar.valor1.value.replace(",", "."));
                                                            if (j[0].parcelas != null && j[0].parcelas != '0') {
                                                                document.getElementById("parcela1").max = parcelas;
                                                            } else {
                                                                document.getElementById("parcela1").max = '1';
                                                            }

                                                            if (j[0].ajuste != null) {
                                                                document.getElementById("ajuste1").value = options;
                                                                valorajuste1 = (numer1 * options) / 100;
                                                                pg1 = numer_1 + valorajuste1;
                                                                document.getElementById("valorajuste1").value = pg1;
//                                                        document.getElementById("desconto1").type = 'text';
//                                                        document.getElementById("valordesconto1").type = 'text';
                                                            } else {
                                                                document.getElementById("ajuste1").value = '0';
                                                                document.getElementById("valorajuste1").value = '0';

                                                            }
                                                            $('.carregando').hide();
                                                        });
                                                    } else {
                                                        $('#ajuste1').html('value=""');
                                                    }
                                                });
                                            });
                                            $(function () {
                                                $('#formapamento2').change(function () {
                                                    if ($(this).val()) {
                                                        forma_pagamento_id = document.getElementById("formapamento2").value;
                                                        $('.carregando').show();
                                                        $.getJSON('<?= base_url() ?>autocomplete/formapagamento/' + forma_pagamento_id + '/', {formapamento2: $(this).val(), ajax: true}, function (j) {
                                                            options = "";
                                                            parcelas = "";
                                                            options = j[0].ajuste;
                                                            parcelas = j[0].parcelas;
                                                            numer_2 = parseFloat(document.form_faturar.valor2.value.replace(",", "."));
                                                            if (j[0].parcelas != null && j[0].parcelas != '0') {
                                                                document.getElementById("parcela2").max = parcelas;
                                                            } else {
                                                                document.getElementById("parcela2").max = '1';
                                                            }

                                                            if (j[0].ajuste != null) {
                                                                document.getElementById("ajuste2").value = options;
                                                                valorajuste2 = (numer2 * options) / 100;
                                                                pg2 = numer_2 + valorajuste2;
                                                                document.getElementById("valorajuste2").value = pg2;
//                                                        document.getElementById("desconto2").type = 'text';
//                                                        document.getElementById("valordesconto2").type = 'text';
                                                            } else {
//                                                        document.getElementById("desconto2").type = 'hidden';
                                                                document.getElementById("ajuste2").value = "0";
//                                                        document.getElementById("valordesconto2").type = 'hidden';
                                                                document.getElementById("valorajuste2").value = "0";
                                                            }

                                                            $('.carregando').hide();
                                                        });
                                                    } else {
                                                        $('#ajuste2').html('value=""');
                                                    }
                                                });
                                            });
                                            $(function () {
                                                $('#formapamento3').change(function () {
                                                    if ($(this).val()) {
                                                        forma_pagamento_id = document.getElementById("formapamento3").value;
                                                        $('.carregando').show();
                                                        $.getJSON('<?= base_url() ?>autocomplete/formapagamento/' + forma_pagamento_id + '/', {formapamento3: $(this).val(), ajax: true}, function (j) {
                                                            options = "";
                                                            parcelas = "";
                                                            options = j[0].ajuste;
                                                            parcelas = j[0].parcelas;
                                                            numer_3 = parseFloat(document.form_faturar.valor3.value.replace(",", "."));
                                                            if (j[0].parcelas != null && j[0].parcelas != '0') {
                                                                document.getElementById("parcela3").max = parcelas;
                                                            } else {
                                                                document.getElementById("parcela3").max = '1';
                                                            }
                                                            valorajuste3 = (numer3 * ajuste3) / 100;
                                                            pg3 = numer_3 - valorajuste3;
                                                            if (j[0].ajuste != null) {
                                                                document.getElementById("ajuste3").value = options;
                                                                valorajuste3 = (numer3 * options) / 100;
                                                                pg3 = numer_3 + valorajuste3;
                                                                document.getElementById("valorajuste3").value = pg3;
                                                            } else {
                                                                document.getElementById("ajuste3").value = "0";
                                                                document.getElementById("valorajuste3").value = "0";
                                                            }
                                                            ;
                                                            $('.carregando').hide();
                                                        });
                                                    } else {
                                                        $('#ajuste3').html('value=""');
                                                    }
                                                });
                                            });
                                            $(function () {
                                                $('#formapamento4').change(function () {
                                                    if ($(this).val()) {
                                                        forma_pagamento_id = document.getElementById("formapamento4").value;
                                                        $('.carregando').show();
                                                        $.getJSON('<?= base_url() ?>autocomplete/formapagamento/' + forma_pagamento_id + '/', {formapamento4: $(this).val(), ajax: true}, function (j) {
                                                            options = "";
                                                            parcelas = "";
                                                            options = j[0].ajuste;
                                                            parcelas = j[0].parcelas;
                                                            numer_4 = parseFloat(document.form_faturar.valor4.value.replace(",", "."));
                                                            if (j[0].parcelas != null && j[0].parcelas != '0') {
                                                                document.getElementById("parcela4").max = parcelas;
                                                            } else {
                                                                document.getElementById("parcela4").max = '1';
                                                            }
                                                            if (j[0].ajuste != null) {
                                                                document.getElementById("ajuste4").value = options;
                                                                valorajuste4 = (numer4 * options) / 100;
                                                                pg4 = numer_4 + valorajuste4;
                                                                document.getElementById("valorajuste4").value = pg4;
                                                            } else {
                                                                document.getElementById("ajuste4").value = "0";
                                                                document.getElementById("valorajuste4").value = "0";
                                                            }

                                                            $('.carregando').hide();
                                                        });
                                                    } else {
                                                        $('#ajuste4').html('value=""');
                                                    }
                                                });
                                            });

                                        });
</script>
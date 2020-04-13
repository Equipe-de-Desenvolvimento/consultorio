<?
//Da erro no home
if ($this->session->userdata('autenticado') != true) {
    redirect(base_url() . "login/index/login004", "refresh");
}
$perfil_id = $this->session->userdata('perfil_id');
$operador_id = $this->session->userdata('operador_id');

function alerta($valor) {
    echo "<script>alert('$valor');</script>";
}

function debug($object) {
    
}

//echo $valor;
?>
<!DOCTYPE html PUBLIC "-//carreW3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="pt-BR" >
    <head>

        <title>STG - SISTEMA DE GESTAO DE CONSULTORIOS V1.0</title>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                        <meta name="author" content="STG SAUDE">
          <!--<script src="<?= base_url() ?>calendario/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
          <link rel="stylesheet" href="<?= base_url() ?>calendario/codebase/dhtmlxscheduler_flat.css" type="text/css" charset="utf-8">
              <script src="<?= base_url() ?>calendario/codebase/locale/locale_pt.js" type="text/javascript" charset="utf-8"></script>-->
                            <!--CSS -->
                            <!--CSS PADRAO DO BOOTSTRAP COM ALGUMAS ALTERAÇÕES DO TEMA-->
                            <link href="<?= base_url() ?>bootstrap/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
                            <link href="<?= base_url() ?>bootstrap/vendor/metisMenu/metisMenu.css" rel="stylesheet" />
                            <link href="<?= base_url() ?>bootstrap/dist/css/sb-admin-2.css" rel="stylesheet" />
                            <!--DATATABLES RESPONSIVE-->
          
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

                            <!--SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

                            
                            <!--SWEET ALERT. (PLUGIN DO ALERTA BONITINHO)-->

                            <script src="<?= base_url() ?>bootstrap/vendor/alert/dist/sweetalert.min.js"></script> 
                            <link href="<?= base_url() ?>css/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" />
                            <!--Scripts necessários para o calendário-->
                            <script type="text/javascript" src="<?= base_url() ?>bootstrap/fullcalendar/lib/moment.min.js"></script>
                            <script src="<?= base_url() ?>bootstrap/fullcalendar/locale/pt-br.js" type="text/javascript" charset="utf-8"></script>
                            <script src="<?= base_url() ?>bootstrap/fullcalendar/fullcalendar.js" type="text/javascript" charset="utf-8"></script>
                            <script src="<?= base_url() ?>bootstrap/fullcalendar/scheduler.js" type="text/javascript" charset="utf-8"></script>

                            </head>
                            <div>
                                <div>

                                </div>

                            </div>

                            <div id="wrapper">

                                <!-- Navigation -->
                                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                                    <div class="navbar-header">
                                        <img src="<?= base_url() ?>img/logo.png" style="position: static; width: 50pt; height: 31pt; margin-left: 15pt;margin-top: 3pt;" alt="stg - logo"/>
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="navbar-header">

                                    </div>  
                                    <!--</a>-->
                                    <!-- /.navbar-header -->

                                    <ul class="nav navbar-top-links navbar-right">

                                        <!-- /.dropdown -->

                                        <!-- /.dropdown -->

                                        <!-- /.dropdown -->
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                Seja bem-vindo, <?= $this->session->userdata('login'); ?> !
                                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-user-left">
                                                <li><a href="<?= base_url() ?>seguranca/operador/alterarheader/<?=$operador_id?>"><i class="fa fa-user fa-fw"></i> Perfil</a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li> 
                                                    <a  onclick="confirmacao();" style="cursor: pointer;"
                                                        ><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                                                </li>
                                            </ul>
                                            <!-- /.dropdown-user -->
                                        </li>


                                    </ul>
                                    <!-- /.navbar-top-links -->

                                    <div class="navbar-default sidebar" role="navigation">
                                        <div class="sidebar-nav navbar-collapse">
                                            <ul class="nav" id="side-menu">

                                                <li>
                                                    <a href="index.html"><i class="fa fa-address-book-o fa-fw"></i> Recepção <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="#"><i class="fa fa-edit fa-fw"></i> Rotinas <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/pacientes">Cadastro</a>
                                                                </li>

                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/exame/listarmultifuncaoconsultacalendario">Agendamento</a>
                                                                </li>
                                                                <!--                                          <li>
                                                                                                              <a href="<?= base_url() ?>ambulatorio/exame/listarmultifuncaoconsulta">Agendamento</a>
                                                                                                          </li>-->

                                                            </ul>

                                                        </li>
                                                        <li>
                                                            <a href="flot.html"><i class="fa fa-bar-chart-o fa-fw"></i> Relatorios <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/relatorioaniversariante">Relatorio Aniversariantes</a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fa fa-user-md fa-fw"></i> Atendimento <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="#"><i class="fa fa-edit fa-fw"></i> Rotinas <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/exame/listarmultifuncaomedicoconsulta">Atendimento Médico</a>
                                                                </li>

                                                            </ul>

                                                        </li>
                                                        
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fa fa-university fa-fw"></i> Financeiro <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="#"><i class="fa fa-edit fa-fw"></i> Rotinas <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/caixa">Entradas</a>
                                                                </li>

                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/caixa/pesquisar2">Saidas</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/contaspagar">Contas a Pagar</a>
                                                                </li>

                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/contasreceber">Contas a Receber</a>
                                                                </li>

                                                                <li>
                                                                    <a href="<?= base_url() ?>cadastros/fornecedor">Credor/Devedor</a>
                                                                </li>

                                                            </ul>

                                                        </li>
                                                        <li>
                                                            <a href="flot.html"><i class="fa fa-bar-chart-o fa-fw"></i> Relatorios <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/relatoriocaixa">Relatorio Caixa</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/relatoriomedicoconveniofinanceiro">Relatorio Produ&ccedil;&atilde;o M&eacute;dica</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/relatorioindicacaoexames">Relatorio Recomendação</a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fa fa-line-chart" aria-hidden="true"></i> Faturamento <span class="fa arrow"></span></a>

                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="#"><i class="fa fa-edit fa-fw"></i> Rotinas <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/exame/faturamentoexame">Faturar</a>
                                                                </li>


                                                            </ul>

                                                        </li>
                                                        <li>
                                                            <a href="flot.html"><i class="fa fa-bar-chart-o fa-fw"></i> Relatorios <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/relatorioexame">Relatorio Conferencia</a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fa fa-cogs fa-fw"></i> Configurações  <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="#"><i class="fa fa-address-book-o fa-fw"></i> Recepção <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li>
                                                                    <a href="<?= base_url() ?>seguranca/operador">Listar Profissionais</a>
                                                                </li>

                                                                

                                                                <!--                                                                <li>
                                                                                                                                    <a href="<?= base_url() ?>ambulatorio/tipoconsulta">Tipo consulta</a>
                                                                                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/agenda">Criação de Agenda</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/agenda/medicoagendaconsulta">Excluir/Alterar Agenda</a>
                                                                </li>
                                                                <!--                                                                <li>
                                                                                                                                    <a href="<?= base_url() ?>ambulatorio/exame">Agenda Manter</a>
                                                                                                                                </li>-->
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/motivocancelamento">Motivo cancelamento</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/indicacao">Manter Indicação</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/guia/configurarimpressao">Configurar Impressão</a>
                                                                </li>
<!--                                                                <li>
                                                                    <a href="<?= base_url() ?>ambulatorio/modelodeclaracao">Modelo Declara&ccedil;&atilde;o</a>
                                                                </li>-->
                                                            </ul>

                                                            <li>

                                                            </li>



                                                            <li>
                                                                <a href="#"><i class="fa fa-clone fa-fw"></i> Modelos <span class="fa arrow"></span></a>
                                                                <ul class="nav nav-third-level">
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelolaudo/pesquisar">Manter Modelo Laudo</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelolinha/pesquisar">Manter Modelo Linha</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modeloreceita/pesquisar">Manter Modelo Receita</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modeloatestado/pesquisar">Manter Modelo Atestado</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modeloreceitaespecial/pesquisar">Manter Modelo R. Especial</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelodeclaracao/pesquisar">Modelo Declara&ccedil;&atilde;o</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelosolicitarexames/pesquisar">Manter Modelo S.Exames</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelomedicamento/pesquisar">Manter Medicamento</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/modelomedicamento/pesquisarunidade">Manter Medicamento Unidade</a>
                                                                    </li>

                                                                    <!--                                                                <li>
                                                                                                                                        <a href="<?= base_url() ?>ambulatorio/modelolinha">Manter Modelo Linha</a>
                                                                                                                                    </li>-->

                                                                </ul>


                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-medkit fa-fw"></i> Procedimentos <span class="fa arrow"></span></a>
                                                                <ul class="nav nav-third-level">
                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/procedimento/pesquisartuss">Manter Procedimentos TUSS</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/procedimento">Manter Procedimentos</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/procedimentoplano">Manter Procedimentos Convenio</a>
                                                                    </li>
                                                                   
                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/convenio">Manter Convenio</a>
                                                                    </li>
                                                                     <li>
                                                                        <a href="<?= base_url() ?>ambulatorio/procedimentoplano/procedimentopercentualpromotor">Manter Percentual Recomendação</a>
                                                                    </li>

                                                                </ul>

                                                            </li>


                                                            <li>
                                                                <a href="#"><i class="fa fa-money fa-fw"></i> Financeiro <span class="fa arrow"></span></a>
                                                                <ul class="nav nav-third-level">
                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/tipo">Manter Tipo</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/classe">Manter Classe</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/forma">Manter Conta</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/formapagamento">Manter Forma de Pagamento</a>
                                                                    </li>

                                                                </ul>

                                                            </li>

                                                            <li>
                                                            <a href="#"><i class="fa fa-gear fa-fw"></i> Aplicativo <span class="fa arrow"></span></a>
                                                            <ul class="nav nav-third-level">
                                                                <li><a href="<?= base_url() ?>ambulatorio/empresa/listarpostsblog">Posts Blog</a></li>
                                                                <li><a href="<?= base_url() ?>ambulatorio/empresa/listarpesquisaSatisfacao">Pesquisa Satisfação</a></li>
                                                            </ul>
                                                            </li>

                                                            <li>
                                                                <a href="#"><i class="fa fa-gear fa-fw"></i> Configuração <span class="fa arrow"></span></a>
                                                                <ul class="nav nav-third-level">
                                                                    <li>
                                                                        <a href="<?= base_url() ?>cadastros/empresa/gerecianet">Manter Gerencia Net</a>
                                                                    </li>

                                                                </ul>

                                                            </li>
                                                    </ul>
                                            </li>   

                                                </li>



                                            </ul>
                                        </div>
                                        <!-- /.sidebar-collapse -->
                                    </div>
                                    <!-- /.navbar-static-side -->
                                </nav>
                            </div>



                            <script>
                                $(document).ready(function () {
                                    $('#txtNascimento').mask('99/99/9999');
                                    $("#valor").maskMoney();
                                    $('#txtCpf').mask('999.999.999-99');
                                    $('.data').mask('99/99/9999');
                                    $('.cnpj').mask('99.999.999/9999-99');
                                    $('.cpf').mask('999.999.999-99');
                                    $('.celular').mask('(99) 99999-9999');
                                    $('.telefone').mask('(99) 9999-9999');
                                    $('.hora').mask('99:99');
                                    $(".integer").maskMoney({allowNegative: false, decimal: '.', affixesStay: false, precision: 2});
                                    $(".percentual").maskMoney({allowNegative: true, decimal: '.', affixesStay: false, precision: 3});
                                    $(".dinheiro").maskMoney({allowNegative: false, thousands: '.', decimal: ',', affixesStay: false, precision: 2});

                                });

                                function confirmacao() {
                                    swal({
                                        title: "Tem certeza?",
                                        text: "Você está prestes a sair do sistema!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#337ab7",
                                        confirmButtonText: "Sim, quero sair!",
                                        cancelButtonText: "Não, cancele!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                    },
                                            function (isConfirm) {
                                                if (isConfirm) {
                                                    window.open('<?= base_url() ?>login/sair', '_self');
                                                } else {
                                                    swal("Cancelado", "Você desistiu de sair do sistema", "error");
                                                }
                                            });

                                }

                            </script>


                            <!--    Aqui abaixo você encontra a função que chama a mensagem bonitinha, pessoa que estiver olhando.-->
                            <!--
                            PRA ALTERAR A MENSAGEM PADRÃO QUE APARECE E O ICONE A QUE É ATRIBUIDO, É SÓ ENTRAR NO UTILITARIO E PROCURAR A FUNÇÃO QUE ELE CHAMA
                            DAI TEM LÁ UM ARRAY ONDE EU PASSO DUAS COISAS, UMA É A MENSAGEM QUE VAI APARECER E A OUTRA É SE É 'WARNING' 'ERROR' OU 'SUCCESS'-->
                            <?php
                            $this->load->library('utilitario');
                            $mensagem = Utilitario::pmf_mensagem($this->session->flashdata('message'));
                            ?>






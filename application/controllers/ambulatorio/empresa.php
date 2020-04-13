<?php

require_once APPPATH . 'controllers/base/BaseController.php';

/**
 * Esta classe é o controler de Servidor. Responsável por chamar as funções e views, efetuando as chamadas de models
 * @author Equipe de desenvolvimento APH
 * @version 1.0
 * @copyright Prefeitura de Fortaleza
 * @access public
 * @package Model
 * @subpackage GIAH
 */
class Empresa extends BaseController {

    function Empresa() {
        parent::Controller();
        $this->load->model('ambulatorio/empresa_model', 'empresa');
        $this->load->model('ambulatorio/empresa_model', 'empresa');
        $this->load->model('seguranca/operador_model', 'operador');
        $this->load->model('app_model', 'app');
        $this->load->library('mensagem');
        $this->load->library('utilitario');
        $this->load->library('pagination');
        $this->load->library('validation');
    }

    function index() {
        $this->pesquisar();
    }

    function pesquisar($args = array()) {

        $this->loadView('ambulatorio/empresa-lista', $args);

//            $this->carregarView($data);
    }

    function carregarempresa($exame_empresa_id) {
        $obj_empresa = new empresa_model($exame_empresa_id);
        $data['obj'] = $obj_empresa;
        //$this->carregarView($data, 'giah/servidor-form');
        $this->loadView('ambulatorio/empresa-form', $data);
    }

    function configurarsms($empresa_id) {
        $data['empresa_id'] = $empresa_id;
        $data['pacotes'] = $this->empresa->pacotesms();
        $data['mensagem'] = $this->empresa->listarinformacaosms();
        $this->loadView('ambulatorio/empresasms-form', $data);
    }

    function excluir($exame_empresa_id) {
        if ($this->procedimento->excluir($exame_empresa_id)) {
            $mensagem = 'Sucesso ao excluir a Empresa';
        } else {
            $mensagem = 'Erro ao excluir a empresa. Opera&ccedil;&atilde;o cancelada.';
        }

        $this->session->set_flashdata('message', $mensagem);
        redirect(base_url() . "ambulatorio/empresa");
    }

    function gravarconfiguracaosms() {
        $empresa_id = $this->empresa->gravarconfiguracaosms();
        if ($empresa_id == "-1") {
            $data['mensagem'] =  'Erro ao salvar configurações de SMS.';
        } else {
            $data['mensagem'] = 'Configuração de SMS efetuada com sucesso.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "ambulatorio/empresa");
    }

    function gravar() {
        $empresa_id = $this->empresa->gravar();
        if ($empresa_id == "-1") {
            $data['mensagem'] = 'Erro ao gravar a Empresa. Opera&ccedil;&atilde;o cancelada.';
        } else {
            $data['mensagem'] = 'Sucesso ao gravar a Empresa.';
        }
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "ambulatorio/empresa");
    }

    function ativar($exame_empresa_id) {
        $this->empresa->ativar($exame_empresa_id);
            $data['mensagem'] = 'Sucesso ao ativar a Empresa.';
        $this->session->set_flashdata('message', $data['mensagem']);
        redirect(base_url() . "ambulatorio/empresa");
    }

    private function carregarView($data = null, $view = null) {
        if (!isset($data)) {
            $data['mensagem'] = '';
        }

        if ($this->utilitario->autorizar(2, $this->session->userdata('modulo')) == true) {
            $this->load->view('header', $data);
            if ($view != null) {
                $this->load->view($view, $data);
            } else {
                $this->load->view('giah/servidor-lista', $data);
            }
        } else {
            $data['mensagem'] = $this->mensagem->getMensagem('login005');
            $this->load->view('header', $data);
            $this->load->view('home');
        }
        $this->load->view('footer');
    }

    function listarpostsblog() {
        //        $data['guia_id'] = $this->guia->verificaodeclaracao();
        //        $data['impressao'] = $this->empresa->listarconfiguracaoimpressao();
        //        var_dump($data['impressao']); die;
                $this->loadView('ambulatorio/configurarpostsblog-lista');
            }

    function carregarpostsblog($posts_blog_id) {
        $data['empresa_impressao_recibo_id'] = $posts_blog_id;
        $data['post'] = $this->empresa->carregarlistarpostsblog($posts_blog_id);
//        var_dump($data['impressao']); die;
        $this->load->View('ambulatorio/configurarpostsblog-form', $data);
    }

    function gravarpostsblog() {
        //        var_dump($_POST); die;
                $posts_blog_id = $_POST['posts_blog_id'];
                if ($this->empresa->gravarpostsblog($posts_blog_id)) {
                    $mensagem = 'Sucesso ao gravar informativo';
                } else {
                    $mensagem = 'Erro ao gravar informativo. Opera&ccedil;&atilde;o cancelada.';
                }
                $this->enviarNotificacao('Um novo informativo foi publicado!');
                $this->session->set_flashdata('message', $mensagem);
                redirect(base_url() . "ambulatorio/empresa/listarpostsblog");
            }

            function enviarNotificacao($mensagem){
                $resposta = $this->app->buscarHashDispositivoPaciente();    
                $headers = array();
                // echo '<pre>';
                // var_dump($resposta); 
                // die;
                if(count($resposta) > 0){
                    $hash = '';
                    $hash_array = array();
                    foreach ($resposta as $key => $value) {
                        $hash_array[] = $value->hash;
                    }
                    $hash = json_encode($hash_array);
                    
                    $url = 'https://onesignal.com/api/v1/notifications';
                    $headers[] = 'Content-Type: application/json; charset=utf-8';
                    $headers[] = 'Authorization: Basic ZTVmZTU2NjEtZDU1My00NzQzLTllZTYtMzFkMjJlMmEzZWZi';
                    $ch = curl_init();
                    $body = '{
                        "app_id": "13964cbb-2421-4e58-b040-0ad8f2b2e9fa",
                        "include_player_ids": '. $hash .',
                        "data": {"foo": "bar"},
                        "contents": {"en": "'. "$mensagem" .'"}
                    }';
                    // var_dump($body);
                    // die;
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        
                    $result = curl_exec($ch);
                    // var_dump($result); die;
                    curl_close($ch);
                    
                    return true;
                }else{
                    return false;
                }
        
            }

            function excluirpostsblog($posts_blog_id) {
                //        var_dump($_POST); die;
                        if ($this->empresa->excluirpostsblog($posts_blog_id)) {
                            $mensagem = 'Sucesso ao excluir post do blog';
                        } else {
                            $mensagem = 'Erro ao gravar post do blog. Opera&ccedil;&atilde;o cancelada.';
                        }
                
                        $this->session->set_flashdata('message', $mensagem);
                        redirect(base_url() . "ambulatorio/empresa/listarpostsblog");
                    }

                    function listarpesquisaSatisfacao() {
                        //        $data['guia_id'] = $this->guia->verificaodeclaracao();
                        //        $data['impressao'] = $this->empresa->listarconfiguracaoimpressao();
                        //        var_dump($data['impressao']); die;
                                $this->loadView('ambulatorio/pesquisasatisfacao-lista');
                            }

                            function detalhespesquisasatisfacao($pesquisa_id) {
                                $data['pesquisa_id'] = $pesquisa_id;
                                $data['detalhes'] = $this->empresa->detalhespesquisasatisfacao($pesquisa_id);
                        //        var_dump($data['impressao']); die;
                                $this->loadView('ambulatorio/pesquisasatisfacao-detalhes', $data);
                            }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

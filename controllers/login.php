<?php

//    make by Shikaru 
class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/default.js');
    }

    function index() {
        $this->view->rander('login/index', true);
    }
    
    function index2() {
        $this->view->loginMode = "modal";
        
        $this->view->randerPage('login/index', array('header'));
    }

    function loginui() {
        $this->view->css = array('login/css/loginui.css');

        $this->view->randerPage('login/loginui', array('header'));
    }

    function run() {
        $this->model->run();
    }

    function logout() {
        Session::destroy();
        header('location: ' . URL . 'index');
        exit();
    }

    //keepAlive is dummy html to use for bootstrap-session-timeout to ping server=side to keep server-side's session data alive.
    function keepAlive() {
        $this->view->randerContent('login/keepAlive');
    }

    function logoff() {
        $this->view->randerContent('login/logoff');
    }

}

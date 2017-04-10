<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/default.js');
    }

    function index() {
//        $this->view->rander('index/index');
        $this->view->randerList(array('index/index','login/index'));
    }
    
    function details() {
        $this->view->rander('index/details');
    }

}

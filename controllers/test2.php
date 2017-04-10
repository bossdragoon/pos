<?php

class Test2 extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('test2/js/default.js');
    }

    function index() {
//        $this->view->rander('index/index');
        $this->view->randerList(array('test2/index'));
    }
    
    function details() {
        $this->view->rander('test2/details');
    }

}

<?php

class About extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('about/js/default.js');
    }
    function index(){
        $this->view->rander('about/index');        
    }
}

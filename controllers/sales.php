<?php

class Sales extends Controller {

//    const ctl = "sites"; 
    private static $ctl = "sales";

    function __construct() {
        parent::__construct();
    }

    function index() {
//        $this->view->rander('index/index');
        $this->view->css = array('sales/css/default.css');
        $this->view->js = array('sales/js/default.js');
        $this->view->randerPage(array('sales/index'));
    }

    function getListings() {
        $this->model->getDataListingsBySqlName('sqlMeeting');
    }

    function getTeamList() {
        $this->loadModel('team');
        return $this->model->getDataListings();
    }

    function getRoomList() {
        $this->loadModel('room');
        return $this->model->getDataListings();
    }

}

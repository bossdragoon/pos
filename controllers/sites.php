<?php

class Sites extends Controller {

//    const ctl = "sites"; 
    private static $ctl = "sites";

    function __construct() {
        parent::__construct();
    }

    function index() {
//        $this->view->rander('index/index');
        $this->view->js = array('sites/js/default.js', 'sites/js/jTable.js');
        $this->view->randerPage(array('sites/index'));
    }

    function form() {

        //set local variable for view
        $this->view->getTeamList = $this->getTeamList();
        $this->view->getRoomList = $this->getRoomList();

//        $this->view->rander('index/index');
        $this->view->js = array('sites/js/formjs.js');
        $this->view->randerPage(array('sites/form'));
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

<?php

class Announcement extends Controller {

    function __construct() {
        parent::__construct();

        $this->view->css = array('../public/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            '../public/awesome-bootstrap-checkbox/Font-Awesome/css/font-awesome.css',
            '../public/bootstrap-datetimepicker/css/bootstrap-datepicker3.css',
            '../public/bootstrap-timepicker/css/bootstrap-timepicker.css',
//            '../public/css/no-more-tables.css',
            '../public/bootstrap-table/bootstrap-table.css',
            '../public/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            'asset/css/default.css'
        );

        $this->view->js = array('announcement/js/default.js',
            'announcement/js/jtable.js',
            '../public/js/jquery.mask.min.js',
            '../public/bootstrap-datetimepicker/js/bootstrap-datepicker.js',
            '../public/bootstrap-datetimepicker/js/bootstrap-datepicker.js',
            '../public/bootstrap-datetimepicker/locales/bootstrap-datepicker.th.min.js',
            '../public/bootstrap-timepicker/js/bootstrap-timepicker.js',
            '../public/bootstrap-table/bootstrap-table.js',
//            '../public/bootstrap-table/extensions/export/bootstrap-table-export.js',
//            '../public/tableExport.jquery.plugin-master/tableExport.min.js',
//            '../public/tableExport.jquery.plugin-master/libs/jsPDF/jspdf.min.js',
//            '../public/tableExport.jquery.plugin-master/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js',
//            '../public/bootstrap-table/extensions/resizable/bootstrap-table-resizable.js',
//            '../public/bootstrap-table/colResizable-1.5.source.js',
            '../public/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.js',
            '../public/bootstrap-table/locale/bootstrap-table-th-TH.min.js'
        );        
        
        
    }

    function index() {
//        $this->view->getAnnouncementList = $this->getAnnouncement();

        $this->view->rander('announcement/index');
    }

    function getListings() {
        $data = $this->model->getAnnouncement();
        echo json_encode($data);
    }

    function getByID() {
        $data = $this->model->getDataByID();
        echo json_encode($data);
    }

    function insertByID() {
        $this->model->insertDataByID();
    }

    function updateByID() {
        $this->model->updateDataByID();
    }

    function deleteByID() {
        $this->model->deleteDataByID();
    }

    function checkUseByID() {
        return $this->model->checkDataUseByID();
    }

    function Pagination() {
        $this->model->Pagination();
    }
    
    
    
    
    
    
    
    
    function getAnnouncementList() {
        $data = $this->model->getAnnouncement();
        return $data;
    }    
    
}

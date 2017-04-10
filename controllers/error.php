<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->errormsg = 'ไม่พบหน้าที่ค้นหา';
        $this->view->errorlabel = 'หน้าที่คุณกำลังหาอาจจะถูกนำออกไปแล้ว กรุณาค้นหาใหม่ หรือติดต่อผู้ดูแลระบบ';
        $this->view->rander('error/index');
    }

    function notLogin() {
        $this->view->errormsg = '';
        $this->view->errorlabel = '...ไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน...';
        $this->view->rander('error/index');
    }

}

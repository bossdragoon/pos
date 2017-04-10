<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db_user = new Database(DB_USER_TYPE . ':host=' . DB_USER_HOST . ';dbname=' . DB_USER_NAME, DB_USER_USER, DB_USER_PASS);
    }

    //Get data aaray from request (normally request)
    protected function getArrFromReq() {
        $arr = array();

        $post = filter_input_array(INPUT_POST);
        $get = filter_input_array(INPUT_GET);

        //POST
        if (sizeof($post) > 0) {
            foreach ($post as $k => $v) {
                $arr[$k] = $v;
            }
        }
        //GET
        else if (sizeof($get) > 0) {
            foreach ($get as $k => $v) {
                $arr[$k] = $v;
            }
        }

        return $arr;
    }

//    protected function getArrFromReq($meth = "POST") {
//        $arr = array();
//        $get = ($meth == "POST" ? filter_input_array(INPUT_POST) : filter_input_array(INPUT_GET));
//        
//        foreach ($get as $k => $v) {
//            $arr[$k] = $v;
//        }
//        return $arr;
//    }    
}

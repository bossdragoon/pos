<?php

class Bootstrap {

    function __construct() {
        $request_url = $keyword = filter_input(INPUT_GET, 'url'); //false if not set,null if filter fail
        $url = explode('/', rtrim((isset($request_url) ? $request_url : null), '/'));
        
        //Set view page that does not require for LOGIN session
        $exception_url = array('index','login','sales','about');
        
        
        //----------- Home page -----------
        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        //---------------------------------
        
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            $logged = Session::get('User');
            if (sizeof($logged) > 0 || in_array($url[0], $exception_url)) {
                require $file;
            } else {
                $this->loginFalse();
                return false;
            }
        } else {
//            require 'controllers/error.php';
//            $controller = new Error();
            $this->error();
            return false;
        }
        
        

        $controller = new $url[0];
        $controller->loadModel($url[0]);
        $controller->view->pageMenu = $url[0];

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else if (isset($url[1])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}();
            } else {
                $this->error();
            }
        } else {
            $controller->index();
        }
        
        //var_dump($url[0]);
        //var_dump($logged['CRS_system']);        
    }

    function error() {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

    function loginFalse() {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->notLogin();
        return false;
    }

    function accessDenied() {
        require 'controllers/denied.php';
        $controller = new Denied();
        $controller->index();
        return false;
    } 
    
    
    
    function accessRight($controller, $type_user) {
        //Set view page that does require accessRight
        $chk_ac_url = array('reports');

        if ((in_array($controller, $chk_ac_url)) && ($type_user === 'staff')) {
            return 'success';
        } else if ((in_array($controller, array('service'))) && ($type_user === 'user')) {
            return 'success';
        } else {
            return 'no_success';
        }
    }    
    
        
}

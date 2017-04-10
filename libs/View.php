<?php

class View {

    function __construct() {
        #echo 'This is the View </br>';
    }

    public function rander($name, $noInclude = false) {

        if ($noInclude == true) {
            require 'views/pagescript.php';
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/menutop.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

    public function randerList($name_list, $noInclude = false) {

        //if $name_list is not array(only one value), change it
        if (is_array($name_list) == false) {
            $name_list = array($name_list);
        }

        if ($noInclude == true) {
            require 'views/pagescript.php';
            foreach ($name_list as $name) {
                require 'views/' . $name . '.php';
            }
        } else {
            require 'views/header.php';
            require 'views/menutop.php';
            foreach ($name_list as $name) {
                require 'views/' . $name . '.php';
            }
            require 'views/footer.php';
        }
    }

    /* =================
     * Extract rander
      ================== */

    public function randerPage($name_list, $optPageComponents = array('header','footer','menutop','pagescript')) {
        //if $name_list is not array(only one value), change it
        if (is_array($name_list) == false) {
            $name_list = array($name_list);
        }
        
        $opt = array_map('strtolower', $optPageComponents);
        
        $setHeader = in_array("header", $opt);
        $setFooter = in_array("footer", $opt);
        $setTopMenu = in_array("menutop", $opt);
        $setPageScript = in_array("pagescript", $opt);

        //HEADER
        if ($setHeader) {
            require 'views/header.php';
            //this will require pagescript.php too.
        } else if ($setPageScript) {
            require 'views/pagescript.php';
        }
        //MENUTOP
        if ($setTopMenu) {
            require 'views/menutop.php';
        }
        
        //PAGE
        foreach ($name_list as $name) {
            require 'views/' . $name . '.php';
        }
        
        //FOOTER
        if ($setFooter) {
            require 'views/footer.php';
        }

    }
    
    public function randerHeader() {
        require 'views/header.php';
        require 'views/menutop.php';
    }

    public function randerFooter() {
        require 'views/footer.php';
    }

    public function randerScript() {
        //not require this when you have already rander header
        require 'views/pagescript.php';
    }

    public function randerContent($name_list) {
        if (is_array($name_list) == false) {
            $name_list = array($name_list);
        }
        foreach ($name_list as $name) {
            require 'views/' . $name . '.php';
        }
    }

}
